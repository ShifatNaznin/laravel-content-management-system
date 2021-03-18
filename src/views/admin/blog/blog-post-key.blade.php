@extends('cmsblog::layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    {{-- <h4 class="card-title">Sample Form with the Icons</h4>
                    <h6 class="card-subtitle">made with bootstrap elements</h6> --}}
                    <form action="{{route('add_blog_post')}}" method="POST" enctype="multipart/form-data"
                        class="form p-t-20">
                        @csrf


                        <div class="form-group">
                            <label for="exampleInputuname">Category</label>
                            <div class="input-group mb-3">
                                <select class="form-control get-key" name="category" id="">
                                    <option value="">Select Category</option>
                                    @if (BlogPackage::show_all_menu())
                                    @foreach (BlogPackage::show_all_menu() as $key=>$item)

                                    <option value="{{ $key }}">{{ $item->name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
    
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
