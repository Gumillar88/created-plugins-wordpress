<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-body">
            <form role="form" method="POST" action="/clients/create" multiple enctype="multipart/form-data">
                
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Alt Image</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Name" value="{{ old('title') }}" required>
                        </div>
                        
                    </div>
                    <div class="col-6">
                        

                        <div class="form-group">
                            <label for="image">
                                Full Image
                                <br>
                                <span style="font-style: italic;color: red;">Image Must be : </span>
                            </label>
                            <input type="file" class="form-control" name="image" id="image" placeholder="Full Image" value="{{ old('image') }}" required>
                        </div>
                    </div>
                    
                </div>

                <p class="text-right">
                    <input type="submit" class="button button-success" value="Create" />
                    <a href="/clients" class="button button-danger">Back</a>
                </p>

            </form>
        </div>
    </div>
</div>
