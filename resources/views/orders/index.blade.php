<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách đơn hàng</title>
    <link rel="stylesheet" href="{{ asset('css/orders/index.css') }}">
</head>

<body>

    <h1>Danh sách đơn hàng</h1>

    {{-- Tìm kiếm và Lọc --}}
    <form method="GET" action="{{ route('orders.index') }}">
        <input
            type="text"
            name="search"
            placeholder="Nhập mã đơn..."
            value="{{ request('search') }}">

        <select name="channel">
            <option value="">Tất cả nguồn đơn</option>
            <option value="tiktok" {{ request('channel') == 'tiktok' ? 'selected' : '' }}>Tiktok</option>
            <option value="lazada" {{ request('channel') == 'lazada' ? 'selected' : '' }}>Lazada</option>
            <option value="shopee" {{ request('channel') == 'shopee' ? 'selected' : '' }}>Shopee</option>
        </select>

        <button type="submit">Tìm kiếm</button>
    </form>

    <br>

    <div class="table-container">
        <table class="order-table">
            <thead>
                <tr>
                    <th>Mã đơn</th>
                    <th>Kênh bán</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                <tr>
                    <td><a href="#" class="text-blue">{{ $order->code }}</a></td>
                    <td>{{ $order->channel }}</td>
                    <td>
                        @php
                            $badgeClass = match($order->status) {
                                'pending' => 'badge-warning',
                                'processing' => 'badge-info',
                                'shipped' => 'badge-success',
                                'cancelled' => 'badge-danger',
                                default => 'badge-default',
                            };
                        @endphp
                        <span class="badge {{ $badgeClass }}">{{ ucfirst($order->status) }}</span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">
                        Không tìm thấy đơn hàng.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <br>

    {{-- Phân trang --}}
    {{ $orders->appends(request()->query())->links('vendor.pagination.custom') }}

</body>

</html>