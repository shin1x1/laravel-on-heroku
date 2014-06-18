<?php
/**
 * @type \Illuminate\Database\Eloquent\Collection|UserImage[] $images
 */
?>
@extends('base')

@section('title')
@stop

@section('sub_content')
    <div class="row">

        <div class="col-lg-12" style="margin-bottom: 20px;">
            <div>
                <a href="upload" class="btn btn-info">upload</a>
            </div>
        </div>

    <?php foreach ($images as $image): ?>
        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#">
                <img class="img-responsive" src="<?= e($image->imageUrl()) ?>"><br>
                create_at: <?= e($image->created_at) ?>
            </a>
        </div>
    <?php endforeach; ?>
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
