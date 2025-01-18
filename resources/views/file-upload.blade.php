@extends("app")

@section("contents")
    <section>
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if($errors->any())
                    <div class="mt-4">
                        @foreach($errors->all() as $error)
                            <div class="alert text-center alert-danger">{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <div class="card mt-5 mb-5">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action={{ route("file.store") }} >
                            @csrf
                            <div class="mb-3">
                                <label for="file" class="form-label">File</label>
                                <input type="file" class="form-control" id="file" name="file" value={{ old("file") }}>
                                @error("file")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
