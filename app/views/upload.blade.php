<?php
/**
 * @type \Illuminate\Database\Eloquent\Collection $images
 * @type \Illuminate\Support\MessageBag $errors
*/
?>
@extends('base')

@section('title')
@stop

@section('sub_content')
    <div class="row">

        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
        <?php foreach ($errors as $error): ?>
            <p class="text-danger"><?= e($error) ?></p>
        <?php endforeach; ?>

        <?= Form::open(['method' => 'post', 'files' => true, 'role' => 'form', 'class' => 'form-horizontal']) ?>
        <?= Form::file('file') ?>
        <?= $errors->first('file', '<p class="text-danger">:message</p>'); ?>
        <input style="margin-top: 20px;" type="submit" class="btn btn-success" value="Upload">
        <?= Form::close() ?>
        </div>

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
