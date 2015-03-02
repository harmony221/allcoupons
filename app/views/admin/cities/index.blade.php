<table class='listing-table' style="width:100%">
  <h3><span class='fa fa-globe'></span>Բոլոր Քաղաքները</h3><hr>
  <tr>
    <th>Անվանում</th>
  </tr>
  @foreach($cities as $city)
  	<tr>
    	<td data-id={{$city->id}}>
        <span class='city-name'>{{$city->name}}</span>
        <span class='fa fa-trash btn btn-danger pull-right delete-city'></span>
        <span class='fa fa-edit btn btn-warning pull-right edit-city'></span>
      </td>
  </tr>
  @endforeach
</table>