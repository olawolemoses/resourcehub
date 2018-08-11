<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta name="viewport" content="width = 1050, user-scalable = no" />
<script type="text/javascript" src="/js/jquery.min.1.7.js"></script>
<script type="text/javascript" src="/js/modernizr.2.5.3.min.js"></script>
</head>
<body>

                    <div class="card-body">
                    
                    <form method="POST" action="{{ route('flip.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">merchantID</label>
                            <div class="col-md-6">
                                <input id="merchant_id" type="text" class="form-control{{ $errors->has('merchant_id') ? ' is-invalid' : '' }}" name="merchant_id" value="{{ old('merchant_id') }}" required autofocus>

                                @if ($errors->has('merchant_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('merchant_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">title</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required autofocus>

                                @if ($errors->has('street'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="street" class="col-md-4 col-form-label text-md-right">published</label>

                            <div class="col-md-6">
                                <input id="published" type="text" class="form-control{{ $errors->has('published') ? ' is-invalid' : '' }}" name="published" value="{{ old('published') }}" required autofocus>

                                @if ($errors->has('published'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('published') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="amount" class="col-md-4 col-form-label text-md-right">amount</label>
                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount" value="{{ old('amount') }}" required autofocus>
                                @if ($errors->has('amount'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">reading_time</label>
                            <div class="col-md-6">
                                <input id="reading_time" type="text" class="form-control{{ $errors->has('reading_time') ? ' is-invalid' : '' }}" name="reading_time" value="{{ old('reading_time') }}" required autofocus>

                                @if ($errors->has('reading_time'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('reading_time') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="author_name" class="col-md-4 col-form-label text-md-right">author_name</label>
                            <div class="col-md-6">
                                <input id="author_name" type="text" class="form-control{{ $errors->has('author_name') ? ' is-invalid' : '' }}" name="author_name" value="{{ old('author_name') }}" required autofocus>

                                @if ($errors->has('author_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('author_name') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="isbn" class="col-md-4 col-form-label text-md-right">isbn</label>
                            <div class="col-md-6">
                                <input id="isbn" type="text" class="form-control{{ $errors->has('isbn') ? ' is-invalid' : '' }}" name="isbn" value="{{ old('isbn') }}" required autofocus>

                                @if ($errors->has('isbn'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('isbn') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="isbn" class="col-md-4 col-form-label text-md-right">tags</label>
                            <div class="col-md-6">
                                <input id="tags" type="text" class="form-control{{ $errors->has('tags') ? ' is-invalid' : '' }}" name="tags" value="{{ old('tags') }}" required autofocus>

                                @if ($errors->has('tags'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('tags') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>                        

                        <div class="form-group row">
                            <label for="filename" class="col-md-4 col-form-label text-md-right">filename</label>
                            <div class="col-md-6">
                                <input id="filename" type="file" class="form-control{{ $errors->has('filename') ? ' is-invalid' : '' }}" name="filename" required autofocus />

                                @if ($errors->has('filename'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('filename') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>                        

                        <div class="form-group row">
                            <label for="photo" class="col-md-4 col-form-label text-md-right">photo</label>
                            <div class="col-md-6">
                                <input id="photo" type="file" class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" name="photo" required autofocus />
                                @if ($errors->has('photo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif                            
                            </div>
                        </div>                  

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Upload
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
</body>
</html>    