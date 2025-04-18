<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Report') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-semibold mb-6">Orders in the Last 7 Days</h2>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 border rounded">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Order #</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Customer</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Shipping Address</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100">
                                @foreach($orders as $order)
                                    <tr>
                                        <td class="px-4 py-2 text-sm text-gray-900">{{ $order->order_number }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-900">{{ $order->customer_id }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-900">
                                            {{ $order->address1 ?? '' }},
                                            {{ $order->address2 ?? '' }},
                                            {{ $order->state ?? '' }},
                                            {{ $order->country ?? '' }}
                                        </td>
                                        <td class="px-4 py-2 text-sm text-gray-900">{{ $order->order_delivery_status ?? '' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if($orders->isEmpty())
                            <div class="text-center text-gray-500 mt-6">
                                No orders found in the last 7 days.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
