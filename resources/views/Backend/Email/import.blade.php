
<div class="row">
    <div class="col-12">

        @if(session('success'))
            <div class="alert alert-success mt-2 mb-2">
                {{ session('success') }}
           </div>
        @endif
        <form method="POST" action="{{ url('/process-email-csv') }}" enctype="multipart/form-data">
            @csrf

        <div class="mb-3">
            <label for="formFile" class="form-label">Import CSV</label>
            <input class="form-control" type="file" name="csv_file" id="formFile" required>
            @if($errors->has('csv_file'))
            <div class="text-danger">{{ $errors->first('csv_file') }}</div>
        @endif
        </div>

        <div>
            <button type="submit" class="btn btn-primary">Import File</button>
        </div>
    </form>
    </div>

</div>
