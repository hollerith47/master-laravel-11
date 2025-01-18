@extends("app")

@section("contents")
    <section>
        <div class="row justify-content-center">
            <div class="col-md-6">
{{--                @if($errors->any())--}}
{{--                    <div class="mt-4">--}}
{{--                        @foreach($errors->all() as $error)--}}
{{--                            <div class="alert text-center alert-danger">{{ $error }}</div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                @endif--}}
                <div class="card mt-5 mb-5">
                    <div class="card-body">
                        <form method="POST" action={{ route("contact.submit") }}>
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value={{ old("name") }}>
                                @error("name")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value={{ old("email") }}>
                                @error("email")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject" value={{ old("subject") }}>
                                @error("subject")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="msg" class="form-label">Message</label>
                                <textarea id="msg" class="form-control" name="message" >{{ old("message") }}</textarea>
                                @error("message")
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
