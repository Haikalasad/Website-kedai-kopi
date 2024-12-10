@extends('templates.main')

@section('content')
<div class="container mx-auto px-4 py-4 m-5">
    <h1 class="text-2xl font-bold my-4">Keranjang Belanja</h1>

    @if($cartItems->isEmpty())
    <p class="text-gray-600">Keranjang Anda kosong.</p>
    @else
    <form id="checkout-form">
        @csrf
        <div class="space-y-4">
            @foreach($cartItems as $item)
            <div class="flex items-center p-4 border-b border-gray-200">
                <input type="checkbox" name="selected_items[]" value="{{ $item->id }}" class="select-item mr-4" />

                <img src="{{ filter_var( $item->coffee->image_url, FILTER_VALIDATE_URL) ?  $item->coffee->image_url : asset('storage/' .  $item->coffee->image_url) }}" 
                    class="w-20 h-20 object-cover rounded mr-4" 
                    alt="{{  $item->coffee->name }}">

                <div class="flex-grow">
                    <h2 class="text-lg font-semibold">{{ $item->coffee->name }}</h2>
                    <p class="text-gray-600">{{ $item->coffee->description }}</p>
                    <div class="flex items-center mt-2">
                        <button type="button" class="bg-gray-300 text-gray-800 px-2 py-1 rounded decrease-qty" data-id="{{ $item->id }}">-</button>
                        <span class="qty mx-2">{{ $item->quantity }}</span>
                        <button type="button" class="bg-gray-300 text-gray-800 px-2 py-1 rounded increase-qty" data-id="{{ $item->id }}">+</button>
                        <button type="button" data-id="{{ $item->id }}" class="remove-item bg-red-500 text-white px-2 py-1 m-2 rounded hover:bg-red-600">Hapus</button>
                    </div>
                </div>

                <div class="text-right">
                    <p class="text-lg font-semibold">Rp <span class="item-price" data-item-total="{{ $item->itemTotal }}">{{ number_format($item->itemTotal, 2) }}</span></p>
                </div>
            </div>
            @endforeach
        </div>

        <div class="flex justify-between items-center mt-4 p-4 bg-gray-100 rounded-lg">
            <h2 class="text-lg font-bold">Total Harga</h2>
            <p class="text-xl font-semibold">Rp <span id="total-price">{{ number_format($totalOverall, 2) }}</span></p>
        </div>

        <div class="flex justify-between items-center mt-4 p-4">
            <div class="checkbox">
                <input type="checkbox" id="select-all" class="mr-2" />
                <label for="select-all" class="text-gray-700">Pilih Semua</label>
            </div>
            <button type="submit" id="pay-button" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Bayar Sekarang</button>

            <input type="hidden" name="total_amount" id="total-amount-input" value="{{ $totalOverall }}">

        </div>
    </form>



    <!-- Modal -->
    <!-- <div id="checkout-modal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
        <div class="bg-white w-96 p-5 rounded-lg">
            <h2 class="text-xl font-bold mb-4">Konfirmasi Checkout</h2>
            <p class="mb-4">Apakah Anda yakin ingin melakukan checkout?</p>
            <p class="text-lg font-semibold">Total Harga: Rp <span id="modal-total-price"></span></p>
            <div class="flex justify-end mt-4">
                <button id="confirm-checkout" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mr-2">Lanjutkan</button>
                <button id="cancel-checkout" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Batal</button>
            </div>
        </div>
    </div> -->

    @endif
</div>


<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}"></script>

<script>
    const checkboxes = document.querySelectorAll('.select-item');
    const totalPriceElement = document.getElementById('total-price');
    const checkoutForm = document.getElementById('checkout-form');
    const selectedItems = [...document.querySelectorAll('.select-item:checked')].map(item => item.value);
    const form = document.getElementById('checkout-form');
    const selectAllCheckbox = document.getElementById('select-all');


    function updateTotalPrice() {
        let total = 0;
        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                const itemElement = checkbox.closest('.flex');
                const itemTotalElement = itemElement.querySelector('.item-price');
                const itemTotal = parseFloat(itemTotalElement.getAttribute('data-item-total').replace(/\./g, '').replace(',', '.'));
                total += itemTotal;
            }
        });

        totalPriceElement.innerText = total.toLocaleString('id-ID', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

    }

    checkboxes.forEach(checkbox => checkbox.addEventListener('change', updateTotalPrice));


    selectAllCheckbox.addEventListener('change', function() {
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
        updateTotalPrice();
    });

    function updateItemPrice() {
        let total = 0;
        const checkedItems = document.querySelectorAll('.select-item:checked');

        if (checkedItems.length === 0) {
            console.log("No items selected.");
        }

        checkedItems.forEach(checkbox => {
            const itemTotalElement = checkbox.closest('.flex').querySelector('.item-price');

            console.log('Checkbox value:', checkbox.value);
            console.log('Item total element:', itemTotalElement);
            if (itemTotalElement) {
                const itemTotal = parseFloat(itemTotalElement.getAttribute('data-item-total').replace(/\./g, '').replace(',', '.'));
                total += itemTotal;
            } else {
                console.error('Item total element not found for checkbox with value:', checkbox.value);
            }
        });

        document.getElementById('total-price').innerText = total.toLocaleString('id-ID', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.increase-qty').forEach(button => {
            button.addEventListener('click', function() {
                const itemId = this.dataset.id;

                fetch(`/cart/increase/${itemId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            location.reload();
                        }
                    })
                    .catch(error => console.error('Fetch error:', error));
            });
        });

        document.querySelectorAll('.decrease-qty').forEach(button => {
            button.addEventListener('click', function() {
                const itemId = this.dataset.id;

                fetch(`/cart/decrease/${itemId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {

                            location.reload();
                        }
                    })
                    .catch(error => console.error('Fetch error:', error));
            });
        });


        document.querySelectorAll('.remove-item').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const itemId = this.dataset.id;

                if (confirm('Apakah Anda yakin ingin menghapus item ini?')) {
                    fetch(`/cart/remove/${itemId}`, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.status === 'success') {
                                location.reload();
                            } else {
                                alert('Gagal menghapus item. Silakan coba lagi.');
                            }
                        })
                        .catch(error => console.error('Fetch error:', error));
                }
            });
        });

        document.getElementById('pay-button').addEventListener('click', function(e) {
            e.preventDefault();

            const selectedItems = Array.from(document.querySelectorAll('input[name="selected_items[]"]:checked'))
                .map(checkbox => checkbox.value);

            if (selectedItems.length === 0) {
                alert("Pilih setidaknya satu item untuk melanjutkan checkout.");
                return;
            }

            const totalPriceText = document.getElementById('total-price').innerText;
            console.log("Total Price Text:", totalPriceText);


            const totalAmount = parseFloat(totalPriceText.replace(/\./g, '').replace(/,/g, '.').trim());

            console.log("Total Amount:", totalAmount);

            if (isNaN(totalAmount)) {
                alert("Nilai total tidak valid. Pastikan formatnya benar.");
                return;
            }

            fetch('/cart/checkout', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        selected_items: selectedItems,
                        total_amount: totalAmount
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.snapToken) {
                        window.snap.pay(data.snapToken, {
                            onSuccess: function(result) {
                        alert("Pembayaran berhasil!");
                        console.log(result);

                        selectedItems.forEach(itemId => {
                            const itemElement = document.getElementById(`item-${itemId}`);
                            if (itemElement) {
                                itemElement.remove();  
                            }

                          
                            fetch(`/cart/remove/${itemId}`, {
                                    method: 'DELETE',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.onSuccess) {
                                        console.log(data.message);
                                    } else {
                                        console.error("Gagal menghapus item dari cart");
                                       
                                    }
                                })
                                .catch(error => console.error("Error saat menghapus item dari cart:", error));
                                location.reload()
                        });

                    },
                            onPending: function(result) {
                                alert("Menunggu pembayaran...");
                                console.log(result);
                            },
                            onError: function(result) {
                                alert("Pembayaran gagal!");
                                console.log(result);
                            },
                            onClose: function() {
                                alert('Anda menutup pop-up tanpa menyelesaikan pembayaran');
                            }
                        });
                    } else {
                        alert("Gagal mendapatkan token pembayaran.");
                    }
                })
                .catch(error => {
                    console.error("Error saat checkout:", error);
                });
        });


    });
</script>
@endsection