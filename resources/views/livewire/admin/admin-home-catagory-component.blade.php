<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Manage catagories
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                         <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>
                        @endif
                        <form action="" class="form-horizontal" wire:submit.prevent="updateCategory">
                            <div class="form-group">
                                <label for="" class="control-label col-md-4">Choose Catagory</label>
                                <div class="col-md-4" wire:ignore>
                                <select name="categories[]" multiple="multiple" class="sel_categories form-control" wire:model="selected_categories">
                                        @foreach ($categories as $category)
                                            <option
                                            @if ($selected_categories != null)
                                                @if (in_array($category->id, $selected_categories))
                                                    selected
                                                @endif
                                            @endif
                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>



                                </div>
                            </div>


                            <div class="form-group">
                                <label for="" class="control-label col-md-4">Number of products</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model="numberofproducts">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label col-md-4"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(document).ready(function(){
        $('.sel_categories').select2();
        $('.sel_caregories').on('change',function(e){
            var data = $('.sel_categories').select2("val");
            @this.set('.sel_categories',data);
        })
    })
</script>
@endpush