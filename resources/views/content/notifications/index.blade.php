@extends('layouts.layoutMaster')

@section('title', 'Notification List - Pages')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <div class="card" style="width: -webkit-fill-available;">
        <div class="card-body">
            <!-- Your existing card content -->

            <!-- Notifications List -->
            <div class="container mt-4">
                <h3>All Notifications</h3>
                <ul class="list-group">
                    @forelse($notifications as $notification)
                        @php

                            $string = $notification->data;
                            preg_match('/Driver(\d+)/', $string, $matches);
                            $deliveryNumber = isset($matches[1]) ? $matches[1] : null;
                            $driver=App\Models\User::where("id",$deliveryNumber)->first();

                        @endphp

                        <li class="list-group-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar">
                                        <a href="{{ route('deliveries.show', ['delivery' => $deliveryNumber]) }}">
                                            <img src="{{ $driver->image }}" alt="User Avatar" class="h-auto rounded-circle" style="max-height: 38px; max-width:21px">
                                        </a>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">{{ $notification->title }} </h6>
                                    <p class="mb-0"><a href="{{route("orders.show",["order"=>$notification->notifiable_id]) }}">{{ $notification->data }}</a></p>
                                    <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                </div>
                                <div class="flex-shrink-0">
                                    <!-- Additional actions or buttons if needed -->
                                </div>
                            </div>
                        </li>
                    @empty
                        <li class="list-group-item">
                            <p class="mb-0">No notifications available.</p>
                        </li>
                    @endforelse
                </ul>
            </div>
            <!-- End Notifications List -->
        </div>
    </div>
</div>
@endsection
