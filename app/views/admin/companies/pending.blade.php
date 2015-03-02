<table class='listing-table' style="width:100%">
  <h3><span class='fa fa-bank'></span>Գործընկերության Հայցեր</h3><hr>
  <tr>
    <th>Անվանում</th>
    <th>Կոնտակտային Անձ</th>
    <th>Քաղաք</th>
    <th>Հեռախոս</th>
    <th>Հասցե</th>
    <th>Էլ. հասցե</th>
    <th>Հաստատել</th>
  </tr>
  @foreach($companies as $company)
  	<tr>
    	<td>{{$company->company_name}}</td>
    	<td>{{$company->first_name." ".$company->last_name}}</td>
    	<td>
        @if($company->city)
          {{$company->city->name}}
        @endif
      </td>
    	<td>{{$company->phone}}</td>
    	<td>{{$company->company_adress}}</td>
      <td>{{$company->email}}</td>
    	<td>
        <span class='btn btn-success fa fa-check confirm-company' data-id={{$company->id}}></span>
      </td>
  </tr>
  @endforeach
</table>