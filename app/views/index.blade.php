<?php
/**
 * @type \Illuminate\Database\Eloquent\Collection $images
 */
?>
@extends('base')

@section('title')
@stop

@section('sub_content')
    <div class="row">

        <div class="col-lg-12" style="margin-bottom: 20px;">
            <h1 class="page-header">Thumbnail Gallery</h1>
            <div>
                <a href="upload" class="btn btn-info">upload</a>
            </div>
        </div>

    <?php foreach ($images as $image): ?>
        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#">
                <img class="img-responsive" src="https://s3-ap-northeast-1.amazonaws.com/laravel-on-heroku/<?= e($loginUser->name) ?>/<?= e($image->id) ?>.jpg"><br>
                create_at: <?= e($image->created_at) ?>
            </a>
        </div>
    <?php endforeach; ?>
<!--        <div class="col-lg-3 col-md-4 col-xs-6 thumb">-->
<!--            <a class="thumbnail" href="#">-->
<!--                <img class="img-responsive" src="http://placehold.it/400x300">-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="col-lg-3 col-md-4 col-xs-6 thumb">-->
<!--            <a class="thumbnail" href="#">-->
<!--                <img class="img-responsive" src="http://placehold.it/400x300">-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="col-lg-3 col-md-4 col-xs-6 thumb">-->
<!--            <a class="thumbnail" href="#">-->
<!--                <img class="img-responsive" src="http://placehold.it/400x300">-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="col-lg-3 col-md-4 col-xs-6 thumb">-->
<!--            <a class="thumbnail" href="#">-->
<!--                <img class="img-responsive" src="http://placehold.it/400x300">-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="col-lg-3 col-md-4 col-xs-6 thumb">-->
<!--            <a class="thumbnail" href="#">-->
<!--                <img class="img-responsive" src="http://placehold.it/400x300">-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="col-lg-3 col-md-4 col-xs-6 thumb">-->
<!--            <a class="thumbnail" href="#">-->
<!--                <img class="img-responsive" src="http://placehold.it/400x300">-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="col-lg-3 col-md-4 col-xs-6 thumb">-->
<!--            <a class="thumbnail" href="#">-->
<!--                <img class="img-responsive" src="http://placehold.it/400x300">-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="col-lg-3 col-md-4 col-xs-6 thumb">-->
<!--            <a class="thumbnail" href="#">-->
<!--                <img class="img-responsive" src="http://placehold.it/400x300">-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="col-lg-3 col-md-4 col-xs-6 thumb">-->
<!--            <a class="thumbnail" href="#">-->
<!--                <img class="img-responsive" src="http://placehold.it/400x300">-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="col-lg-3 col-md-4 col-xs-6 thumb">-->
<!--            <a class="thumbnail" href="#">-->
<!--                <img class="img-responsive" src="http://placehold.it/400x300">-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="col-lg-3 col-md-4 col-xs-6 thumb">-->
<!--            <a class="thumbnail" href="#">-->
<!--                <img class="img-responsive" src="http://placehold.it/400x300">-->
<!--            </a>-->
<!--        </div>-->
    </div>

    <hr>

    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Company 2014</p>
            </div>
        </div>
    </footer>
@stop
