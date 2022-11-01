
  
    <label>Select category level</label>
      <select name="parent_id" id="parent_id" class="form-control select2" style="width: 100%;" required>
        <option value="0" @if (!empty($categoryData->parent_id) && $categoryData->parent_id==0) selected @elseif (!empty(@old('parent_id')) && @old('parent_id')==0) selected @endif>Main category</option>
        
        @if (!empty($getCategories))
            @foreach ($getCategories as $cate)
            <option value="{{ $cate['id']}}" @if (!empty($categoryData->parent_id) && $categoryData->parent_id==$cate['id']) selected @elseif (!empty(@old('parent_id')) && @old('parent_id')==$cate->id) selected  @endif>{{ $cate['cate_name'] }}</option>
           
            @endforeach
        @endif
        
      </select>
    
  
