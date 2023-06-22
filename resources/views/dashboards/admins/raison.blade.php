@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Dashboard')
@section('content')
<style>
    .wrraper-all{
        display:flex;
        align-items:center;
        justify-content:center;
        min-height:100vh;
        background:linear-gradient(#4671EA,#AC34E7);
    }
    .wrraper{
        display:flex;
        align-items:center;
        justify-content:center;
        min-height:100vh;
        background:linear-gradient(#4671EA,#AC34E7);
    }
</style>
<div class="wrraper-all">
    <div class="wrapper">
    <h2>Raison</h2>
    <textarea name="raison" id="summernote"></textarea>
    </div>
    
</div>

@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<script>
$(document).ready(function() {
  $('#summernote').summernote({
        placeholder: 'raison',
        tabsize: 2,
        height: 300,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      })
});
</script>
