<x-layouts.app>
  <x-navbar />
    <x-slot name="scripts">
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <script type="text/javascript">
          $(document).ready(function () {
          $('.ckeditor').ckeditor();
          });
         </script>
    </x-slot>
<section class="section">
<div class="container">
    <div class="title is-2 form">Create JobVacancy</div>

    <form action=" {{route('jobvacancies.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="field">
        <label class="label form"> title</label>
        <div class="control">
          <input class="input @error('title')is-danger @enderror is-normal" name="title" type="text" value="{{ old('title') }}" placeholder="Enter tilte of vacancy">
        </div>
        @error('title')
          <p class="help is-danger">{{ $message }}</p>
        @enderror
      </div>

      <div class="field">
        <label class="label form">Description</label>
        <div class="control">
          <textarea class="ckeditor textarea @error('description')is-danger @enderror is-small" name="description" placeholder="Descripe your restaurant..">{{ old('description') }}</textarea>
          <script type="text/javascript">
            CKEDITOR.replace( 'content' );
          </script>
          <input type="hidden" name="content" id="content">
        </div>
        @error('description')
          <p class="help is-danger">{{ $message }}</p>
        @enderror
      </div>

      <div class="field">
        <label class="label form"> End of Vacancy:</label>
        <div class="control">
          <input  class="input @error('end_of_vacancy')is-danger @enderror is-normal" name="end_of_vacancy" type="date"  value="{{ old('end_of_vacancy') }}" placeholder="" min="" max="">
        </div>
        @error('end_of_vacancy')
          <p class="help is-danger">{{ $message }}</p>
        @enderror
      </div>

      <div class="field is-grouped">
        <div class="control">
          <button class=" is-link form-button">Create</button>
        </div>
        <div class="control">
          <button class=" is-link is-light form-button">Cancel</button>
        </div>
      </div>
    </form>
</div>
</section>
</x-layouts.app>
