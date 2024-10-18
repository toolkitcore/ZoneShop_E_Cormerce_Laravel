@extends('admin_layout')
@section('content_admin')
    @include('components.toast')//

    <div class="page-content">
        <div class="container-xxl">

            <div class="row">

                <div class="col-xl-11 col-lg-11">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Product Images: <a href=""
                                    class="text-primary">{{ $product_item->product_name }}</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="mt-3 mb-2">
                                @foreach ($product_images as $item_pic)
                                    <img id="imagePreview" src="{{ asset($item_pic->image_name) }}"
                                        alt="{{ asset($item_pic->category_image) }}" width="100"
                                        style="margin-left: 2px" />
                                @endforeach
                            </div>
                            <form action="{{ URL::to('/update-product-images/' . $product_item->product_id) }}"
                                method="post" class="dropzone" id="myDragAndDropUploader" data-plugin="dropzone"
                                data-previews-container="#file-previews"
                                data-upload-preview-template="#uploadPreviewTemplate" enctype="multipart/form-data">
                                @csrf
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div>
                                <div class="dz-message needsclick">
                                    <i class="bx bx-cloud-upload fs-48 text-primary"></i>
                                    <h3 class="mt-4">Drop your images here, or <span class="text-primary">click to
                                            browse</span></h3>
                                    <span class="text-muted fs-13">
                                        1600 x 1200 (4:3) recommended. PNG, JPG and GIF files are allowed
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-3 bg-light mb-3 rounded">
                        <div class="row justify-content-end g-2">
                            <div class="col-lg-2">
                                <a href="{{ URL::to('/product-images') }}" class="btn btn-outline-secondary w-100">Back</a>
                            </div>
                            <div class="col-lg-2">
                                <a href="{{ URL::to('delete-list-images/' . $product_item->product_id) }}" type="submit"
                                    id="update" class="btn btn-outline-secondary w-100"
                                    data-id="{{ $product_item->product_id }}">Update Images</a>
                            </div>
                            <div class="col-lg-2">
                                <a href="#!" type="reset" class="btn btn-primary w-100">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        var maxFilesizeVal = 12;
        var maxFilesVal = 4;

        Dropzone.options.myDragAndDropUploader = {
            paramName: "update",
            maxFilesize: maxFilesizeVal, // MB
            maxFiles: maxFilesVal,
            resizeQuality: 1.0,
            acceptedFiles: ".jpeg,.jpg,.png,.webp",
            addRemoveLinks: true,
            timeout: 60000,
            parallelUploads: 4,
            autoProcessQueue: false,
            dictDefaultMessage: "Drop your files here or click to upload",
            dictFallbackMessage: "Your browser doesn't support drag and drop file uploads.",
            dictFileTooBig: "File is too big. Max filesize: " + maxFilesizeVal + "MB.",
            dictInvalidFileType: "Invalid file type. Only JPG, JPEG, PNG files are allowed.",
            dictMaxFilesExceeded: "You can only upload up to " + maxFilesVal + " files.",
            maxfilesexceeded: function(file) {
                this.removeFile(file);
            },
            sending: function(file, xhr, formData) {
                $('#message').text('Image Uploading...');
            },
            success: function(file, response) {


                console.log(response.success);
                console.log(response);
            },
            error: function(file, response) {
                // Hiển thị thông báo toast cho lỗi
                var errorMessage = response.message || 'Something Went Wrong!';

                $('#message').text(errorMessage);
                console.log(response);
                return false;
            }
        };

        document.getElementById("update").addEventListener("click", function() {
            var myDropzone = Dropzone.forElement("#myDragAndDropUploader");
            if (myDropzone.getQueuedFiles().length > 0) {
                myDropzone.processQueue();
            } else {
                $('#message').text('No files to upload.');
            }
        });

        function showToast(text, options) {
            Toastify({
                text: text,
                gravity: options.gravity, // 'top' hoặc 'bottom'
                position: options.position, // 'left' hoặc 'right'
                duration: options.duration,
                close: true,
                backgroundColor: options.backgroundColor, // Thêm màu cho toast
            }).showToast();
        }
    </script>
@endsection
