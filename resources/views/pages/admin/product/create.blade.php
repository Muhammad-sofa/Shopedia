@extends('layouts.admin')

@section('title')
Product
@endsection

@section('content')
<!--Section Content!-->
<div class="section-content section-dashboard-home" data-aos="fade-up">
     <div class="container-fluid">
          <div class="dashboard-heading">
               <h2 class="dashboard-title">
                    Product
               </h2>
               <p class="dashboard-subtitle">
                    Create New Product
               </p>
          </div>
          <div class="dashboard-content">
               <div class="row">
                    <div class="col-md-12">
                         @if($errors->any())
                              <div class="alert alert-danger">
                                   <ul>
                                        @foreach($errors->all() as $error)
                                             <li>{{ $error }}</li>
                                        @endforeach
                                   </ul>
                              </div>
                         @endif
                         <div class="card">
                              <div class="card-body">
                                   <!-- enctype=multipart/form-data untuk bisa upload file !-->
                                   <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                             <div class="col-md-12">
                                                  <div class="form-group">
                                                       <label>Nama Product</label>
                                                       <input type="text" name="name" class="form-control" required>
                                                  </div>
                                             </div>
                                             <div class="col-md-12">
                                                  <div class="form-group">
                                                       <label>Pemilik Produk</label>
                                                       <select name="users_id" required class="form-control">
                                                            @foreach($users as $user)
                                                                 <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                            @endforeach
                                                       </select>
                                                  </div>
                                             </div>
                                             <div class="col-md-12">
                                                  <div class="form-group">
                                                       <label>Product Category</label>
                                                       @foreach($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                       @endforeach
                                                  </div>
                                             </div>
                                             <div class="col-md-12">
                                                  <div class="form-group">
                                                       <label>Harga Product</label>
                                                       <input type="number" name="price" class="form-control" required>
                                                  </div>
                                             </div>
                                             <div class="col-md-12">
                                                  <div class="form-group">
                                                       <label>Product Description</label>
                                                       <textarea name="description" id="editor"></textarea>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="row">
                                             <div class="col text-right">
                                                  <button type="submit" class="btn btn-success px-5">
                                                       Save Now
                                                  </button>
                                             </div>
                                        </div>
                                   </form>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
@endsection

@push('addon-script')
     <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
     <script>
          CKEDITOR.replace('editor');
     </script>
@endpush