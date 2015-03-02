<table class='listing-table' style="width:100%">
  <h3><span class='fa fa-list'></span>Բոլոր Կատեգորիաները</h3><hr>
  <tr>
    <th>Անվանում</th>
  </tr>
  @foreach($categories as $category)
  	<tr>
    	<td data-id={{$category->id}}>
        <span class='category-name'>{{$category->name}}</span>
        <span class='fa fa-trash btn btn-danger pull-right delete-category'></span>
        <span class='fa fa-edit btn btn-warning pull-right edit-category'></span>
      </td>
  </tr>
  @endforeach
</table>