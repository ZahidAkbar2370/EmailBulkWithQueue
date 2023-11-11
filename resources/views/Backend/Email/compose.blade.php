@extends('Backend.admin_layout')
@section('content')


<div class="row mt-5">
    <div class="col-12">
        <div class="d-flex justify-content-between">
            <h3>Compose</h3>
        </div>
    </div>
    <div class="col-12 mt-3">
        <form action="{{ URL::to('') }}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Select Email</label>
                        <select class="form-control" name="email" required>
                            <option value="">Send To</option>
                            <option value="all">All Mails</option>
                            <option value="active_email">Active Mails</option>
                            <option value="inactive_email">Inactive Mails</option>
                            <option value="users">Users</option>
                        </select>
                    </div>
                </div>
              <div class="col">
                <div class="form-group">
                    <label>Subject</label>
                    <input type="text" class="form-control" name="subject" placeholder="Subject">
                </div>
              </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <div class="form-group">
                        <label>Message</label>
                        <textarea name="" placeholder="Enter Your Message" class="form-control"></textarea>
                    </div>
                </div>
              </div>

              <div class="row mt-2">
                <div class="col">
                    <div class="form-group">
                        <input type="submit" class="btn btn-success">
                    </div>
                </div>
              </div>

          </form>
    </div>
</div>



<!-- Place the first <script> tag in your HTML's <head> -->
    <script src="https://cdn.tiny.cloud/1/e1lcv2whqbysl6ly792l0h69tazqu9tfa4p9h4k9i4ab7bbi/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
          selector: 'textarea',
          plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
          toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
          tinycomments_mode: 'embedded',
          tinycomments_author: 'Author name',
          mergetags_list: [
            { value: 'First.Name', title: 'First Name' },
            { value: 'Email', title: 'Email' },
          ],
          ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
        });
      </script>
    
@endsection