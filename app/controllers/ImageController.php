<?php

/**
 * Class ImageController
 */
class ImageController extends BaseController
{
    /**
     * @var integer
     */
    protected $imageWidth;
    /**
     * @var integer
     */
    protected $imageHeight;
    /**
     * @var integer
     */
    protected $imageSizeLimit;

    /**
     *
     */
    public function __construct()
    {
        $this->imageWidth = Config::get('app.image.width');
        $this->imageHeight = Config::get('app.image.height');
        $this->imageSizeLimit = Config::get('app.image.size_limit');
    }

    /**
     *
     */
    public function getIndex()
    {
        $images = UserImage::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        return View::make('index')->with('loginUser', Auth::user())->with('images', $images);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getUpload()
    {
        return View::make('upload')->with('loginUser', Auth::user());
    }

    /**
     *
     */
    public function postUpload()
    {
        $rules = [
            'file' => 'required|image|max:' . $this->imageSizeLimit
        ];

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator->errors())->withInput();
        }

        DB::transaction(function () {
            $userImage = new UserImage();
            $userImage->user_id = Auth::id();
            $userImage->save();

            // resize
            $path = tempnam(storage_path('images'), 'image');
            $image = Image::make(Input::file('file'));

            $image->fit($this->imageWidth, $this->imageHeight);
            $image->save($path);

            /** @var \Aws\S3\S3Client $s3 */
            $s3 = AWS::get('s3');
            $s3->putObject([
                'Bucket' => 'laravel-on-heroku',
                'Key' => '/demo/' . $userImage->id . '.jpg',
                'SourceFile' => $path,
            ]);

            $image->destroy();
            File::delete($path);
        });

        return Redirect::to('/');
    }

}