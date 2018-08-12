@extends('welcome')
<br>
<br>
<br>
<br>
<br>
<form action="uploadfilepost" enctype="multipart/form-data" method="post">
    {{csrf_field()}}
    <input type="file" name="image">
    <br>
    <button class="btn btn-primary" type="submit">Submit</button>
</form>
<img src="/tmp/phpEWmwSf">