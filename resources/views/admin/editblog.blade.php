@extends('admin/layout.app')

@section('title')
Edit blog
@endsection

@section('sidebar')
@include('admin/layout/sidebar')
@endsection

@section('header')
{{-- Header --}}
<x-admin-header title="Edit blog #{{$blog->id}}"></x-admin-header>
@endsection

@section('footer')
{{-- Footer --}}
@include('admin/layout/footer')
@endsection

@section('content')
{{-- Title --}}
{{-- Content --}}
<main>
    <form action="{{route('admin_blog_store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col-reverse gap-8 md:flex-row">
           <div class="flex-1 mt-1">
                <div>
                    <label for="blog_title" class="block">Title</label>
                    <input type="text" id="blog_title" required name="title" placeholder="Input blog's title" value="{{$blog->title}}" class="w-full px-2 py-2 mt-1 border border-solid outline-none peer border-gray_custom focus:border-gray_custom_3">
                    <p class="invisible peer-invalid:visible text-red_custom">Please enter blog's title</p>
                </div>
                <div>
                    <label for="blog_title" class="block">Written by</label>
                    <input type="text" id="written_by" required name="written_by" placeholder="Input blog's writer" value="{{$blog->written_by}}" class="w-full px-2 py-2 mt-1 border border-solid outline-none peer border-gray_custom focus:border-gray_custom_3">
                    <p class="invisible peer-invalid:visible text-red_custom">Please enter written by</p>
                </div>
               <div>
                    <label for="abstract" class="block">Abstract</label>
                    <input type="text" id="abstract" required name="abstract" placeholder="Input blog's abstract" value="{{$blog->abstract}}" class="w-full px-2 py-2 mt-1 border border-solid outline-none peer border-gray_custom focus:border-gray_custom_3">
                    <p class="invisible peer-invalid:visible text-red_custom">Please enter blog's abstract</p>
               </div>
                <div>
                    <label for="blogtypes" class="block">Blog types</label>
                    <select name="blogtypes" class="w-full px-2 py-2 border border-solid border-gray_custom_2">
                        @foreach($types as $key => $type)
                            <option class="w-full" value="{{$type->id}}" @selected($blog->blog_type_id == $type->id)>{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex items-center justify-center flex-1">
                <label for="image_title" class="block w-full cursor-pointer">
                    <img src="{{(isset($blog->image_title) ? asset('images/blogs/'.$blog->image_title) : asset('images/books/no-image.jpg'))}}" alt="image_title" class="w-full border border-solid rounded-md aspect-[2/1] object-contain border-darkRed_custom">
                </label>
                <input onchange="changeInputImg(event)" type="file" id="image_title" name="image_title" placeholder="Input blog's title" class="w-full px-2 py-2 border border-solid outline-none peer border-gray_custom focus:border-gray_custom_3" hidden>
            </div>
        </div>
        <div class="border border-black border-solid mt-7 min-h-[300px] rounded-sm">
            <textarea placeholder="Blog's content" name="content" id="editor"></textarea>
        </div>
        <div class="flex flex-col-reverse justify-end gap-4 sm:flex-row">
            <a href="{{route('admin_blogs')}}" class="inline-block w-full h-full px-4 py-3 mt-2 text-center text-white rounded cursor-pointer sm:w-40 bg-darkRed_custom">Back</a>
            <button type="submit" class="inline-block w-full h-full px-4 py-3 mt-2 text-white rounded cursor-pointer sm:w-auto bg-blue_custom">Update blog</button>
        </div>
    </form>
</main>
{{-- Notification when has error --}}
@if(session('ms_error'))
    <x-toast type="error" msg="{{session('ms_error')}}"/>
@endif

{{-- Notification when success --}}
@if(session('msg'))
    <x-toast type="infor" msg="{{session('msg')}}"/>
@endif
@endsection
@pushOnce('scripts')
    <script src="{{asset('/ckeditor5/ckeditor.js')}}"></script>
@endPushOnce
@pushOnce('scripts_low')
    <script>
    //Upload image in ckeditor
    class MyUploadAdapter {

    constructor( loader ) {
        // The file loader instance to use during the upload. It sounds scary but do not
        // worry — the loader will be passed into the adapter later on in this guide.
        this.loader = loader;
    }
    // Starts the upload process.
    upload() {
        return this.loader.file
            .then( file => new Promise( ( resolve, reject ) => {
                this._initRequest();
                this._initListeners( resolve, reject, file );
                this._sendRequest( file );
            } ) );
    }

    // Aborts the upload process.
    abort() {
        if ( this.xhr ) {
            this.xhr.abort();
        }
    }

    // Initializes the XMLHttpRequest object using the URL passed to the constructor.
    _initRequest() {
        const xhr = this.xhr = new XMLHttpRequest();

        // Note that your request may look different. It is up to you and your editor
        // integration to choose the right communication channel. This example uses
        // a POST request with JSON as a data structure but your configuration
        // could be different.
        xhr.open( 'POST', '{{route('ckeditor_upload')}}', true );
        xhr.setRequestHeader('x-csrf-token','{{ csrf_token() }}');
        xhr.responseType = 'json';
    }

    // Initializes XMLHttpRequest listeners.
    _initListeners( resolve, reject, file ) {
        const xhr = this.xhr;
        const loader = this.loader;
        const genericErrorText = `Couldn't upload file: ${ file.name }.`;

        xhr.addEventListener( 'error', () => reject( genericErrorText ) );
        xhr.addEventListener( 'abort', () => reject() );
        xhr.addEventListener( 'load', () => {
            const response = xhr.response;

            // This example assumes the XHR server's "response" object will come with
            // an "error" which has its own "message" that can be passed to reject()
            // in the upload promise.
            //
            // Your integration may handle upload errors in a different way so make sure
            // it is done properly. The reject() function must be called when the upload fails.
            if ( !response || response.error ) {
                return reject( response && response.error ? response.error.message : genericErrorText );
            }

            // If the upload is successful, resolve the upload promise with an object containing
            // at least the "default" URL, pointing to the image on the server.
            // This URL will be used to display the image in the content. Learn more in the
            // UploadAdapter#upload documentation.
            resolve( {
                default: response.url
            } );
        } );

        // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
        // properties which are used e.g. to display the upload progress bar in the editor
        // user interface.
        if ( xhr.upload ) {
            xhr.upload.addEventListener( 'progress', evt => {
                if ( evt.lengthComputable ) {
                    loader.uploadTotal = evt.total;
                    loader.uploaded = evt.loaded;
                }
            } );
        }
    }

     // Prepares the data and sends the request.
     _sendRequest( file ) {
        // Prepare the form data.
        const data = new FormData();

        data.append( 'upload', file );

        // Important note: This is the right place to implement security mechanisms
        // like authentication and CSRF protection. For instance, you can use
        // XMLHttpRequest.setRequestHeader() to set the request headers containing
        // the CSRF token generated earlier by your application.

        // Send the request.
        this.xhr.send( data );
    }}
    function MyCustomUploadAdapterPlugin( editor ) {
        editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
            // Configure the URL to the upload script in your back-end here!
            return new MyUploadAdapter( loader );
        };
    }


        ClassicEditor
            .create( document.querySelector( '#editor' ),{
        extraPlugins: [ MyCustomUploadAdapterPlugin ],
        }).then((editor)=>{
            editor.setData('{!! $blog->content !!}')
        })
        .catch( error => {
            console.error( error );
        });
    </script>
    {{-- changeInputImg funtion in custom.js --}}
    <script src="{{asset('/js/custom.js')}}"></script>
@endPushOnce
