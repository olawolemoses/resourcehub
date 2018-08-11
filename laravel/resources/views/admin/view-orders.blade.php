

@if($customer = App\Models\Customer::find($orders->id))
Customer Name : {{ $customer->name() }}<br>
Customer Phone No:{{ $customer->mobile_no }}<br>
@endif
@if($service = App\Models\Service::find($orders->id))
Service Name :{{ $service->service_name }}<br>
Service Price: {{ $service->price }}<br>
@endif
@if($orders->fulfilled == 0 ) 
{{ "Status:Not Done" }}<br>
@elseif($orders->fulfilled == 1)
{{ "Status:Done" }}<br>
@endif
Date Created: {{ $orders->created_at }}



