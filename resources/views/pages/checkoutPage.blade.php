@extends('layouts.mainV2')

@section('title', 'Checkout - CLOTHIFY')

@section('content')

<div style="display: flex; gap: 2rem; max-width: 1200px; margin: 0 auto; padding: 2rem 1rem; min-height: 100vh;">

    <!-- KOLOM KIRI: FORMS -->
    <div style="flex: 1; min-width: 0;">

        <div style="display: flex; flex-direction: column; gap: 1.5rem;">

            <!-- 1. Address Detail -->
            <div style="background: white; padding: 1.5rem; border-radius: 0.75rem; border: 1px solid #e5e7eb;">
                <h2 style="font-size: 1.125rem; font-weight: 600; margin-bottom: 1rem;">Address Detail</h2>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                    <div>
                        <label style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.25rem;">Full Name</label>
                        <input type="text" name="full_name" placeholder="John Doe"
                            style="width: 100%; padding: 0.625rem 1rem; border: 1px solid #d1d5db; border-radius: 0.5rem;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.25rem;">Phone Number</label>
                        <input type="tel" name="phone" placeholder="08xxxxxxxxxx"
                            style="width: 100%; padding: 0.625rem 1rem; border: 1px solid #d1d5db; border-radius: 0.5rem;">
                    </div>
                </div>

                <!-- Region Dropdowns (DUMMY) -->
                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                    <div>
                        <label style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.25rem;">Province</label>
                        <select name="province" style="width: 100%; padding: 0.625rem 1rem; border: 1px solid #d1d5db; border-radius: 0.5rem;">
                            <option value="">Select Province</option>
                            <option value="dki">DKI Jakarta</option>
                            <option value="jabar">Jawa Barat</option>
                            <option value="jateng">Jawa Tengah</option>
                            <option value="jatim">Jawa Timur</option>
                            <option value="bali">Bali</option>
                        </select>
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.25rem;">City</label>
                        <select name="city" style="width: 100%; padding: 0.625rem 1rem; border: 1px solid #d1d5db; border-radius: 0.5rem;">
                            <option value="">Select City</option>
                            <option value="jakarta-pusat">Jakarta Pusat</option>
                            <option value="bandung">Bandung</option>
                            <option value="semarang">Semarang</option>
                            <option value="surabaya">Surabaya</option>
                            <option value="denpasar">Denpasar</option>
                        </select>
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.25rem;">District</label>
                        <select name="district" style="width: 100%; padding: 0.625rem 1rem; border: 1px solid #d1d5db; border-radius: 0.5rem;">
                            <option value="">Select District</option>
                            <option value="gambir">Gambir</option>
                            <option value="coblong">Coblong</option>
                            <option value="semarang-tengah">Semarang Tengah</option>
                            <option value="gubeng">Gubeng</option>
                            <option value="denpasar-selatan">Denpasar Selatan</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.25rem;">Address Detail</label>
                    <textarea name="address_detail" rows="3" placeholder="Street name, RT/RW, Landmark..."
                        style="width: 100%; padding: 0.625rem 1rem; border: 1px solid #d1d5db; border-radius: 0.5rem;"></textarea>
                </div>
            </div>

            <!-- 2. Shipping Method -->
            <div style="background: white; padding: 1.5rem; border-radius: 0.75rem; border: 1px solid #e5e7eb;">
                <h2 style="font-size: 1.125rem; font-weight: 600; margin-bottom: 1rem;">Shipping Method</h2>
                <label style="display: flex; align-items: center; gap: 0.75rem; padding: 1rem; border: 1px solid #d1d5db; border-radius: 0.5rem; cursor: pointer;">
                    <input type="radio" name="shipping_method" value="reguler" checked style="display: none;">
                    <div style="width: 2.5rem; height: 2.5rem; background: #f3f4f6; border-radius: 0.375rem; display: flex; align-items: center; justify-content: center;">
                        <i class="fa-solid fa-truck" style="color: #4b5563;"></i>
                    </div>
                    <div style="flex: 1;">
                        <div style="font-size: 0.875rem; font-weight: 500;">Reguler (2 - 3 hari)</div>
                        <div style="font-size: 0.75rem; color: #6b7280;">Estimasi tiba lebih cepat</div>
                    </div>
                    <i class="fa-solid fa-chevron-right" style="color: #9ca3af; font-size: 0.875rem;"></i>
                </label>
            </div>

            <!-- 3. Payment Method -->
            <div style="background: white; padding: 1.5rem; border-radius: 0.75rem; border: 1px solid #e5e7eb;">
                <h2 style="font-size: 1.125rem; font-weight: 600; margin-bottom: 1rem;">Payment Method</h2>
                <label style="display: flex; align-items: center; gap: 0.75rem; padding: 1rem; border: 1px solid #d1d5db; border-radius: 0.5rem; cursor: pointer;">
                    <input type="radio" name="payment_method" value="qris" checked style="display: none;">
                    <div style="width: 2.5rem; height: 2.5rem; background: #f3f4f6; border-radius: 0.375rem; display: flex; align-items: center; justify-content: center;">
                        <i class="fa-solid fa-qrcode" style="color: #4b5563;"></i>
                    </div>
                    <div style="flex: 1;">
                        <div style="font-size: 0.875rem; font-weight: 500;">QRIS</div>
                    </div>
                    <i class="fa-solid fa-chevron-right" style="color: #9ca3af; font-size: 0.875rem;"></i>
                </label>
            </div>

        </div>
    </div>

    <!-- KOLOM KANAN: ORDER SUMMARY -->
    <div style="width: 384px; flex-shrink: 0; position: sticky; top: 100px; height: fit-content;">
        <div style="background: white; border: 1px solid #e5e7eb; border-radius: 0.75rem; padding: 1.5rem;">

            <!-- Product -->
            <div style="display: flex; gap: 1rem; padding-bottom: 1.5rem; border-bottom: 1px solid #f3f4f6;">
                <img src="https://placehold.co/80x100/e2e8f0/64748b?text=IMG"
                    style="width: 80px; height: 100px; object-fit: cover; border-radius: 0.5rem; flex-shrink: 0;">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 0.875rem; font-weight: 600; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Product 1</div>
                    <div style="font-size: 0.75rem; color: #6b7280; margin-top: 0.25rem;">Size: XL</div>
                    <div style="font-size: 0.75rem; color: #6b7280; margin-top: 0.25rem;">Total Item: 2</div>
                </div>
                <div style="font-size: 0.875rem; font-weight: 600; white-space: nowrap;">Rp. 300.000</div>
            </div>

            <!-- Price -->
            <div style="margin-top: 1.5rem; font-size: 0.875rem;">
                <div style="display: flex; justify-content: space-between; margin-bottom: 0.75rem; color: #4b5563;">
                    <span>SUBTOTAL</span>
                    <span>Rp. 300.000</span>
                </div>
                <div style="display: flex; justify-content: space-between; margin-bottom: 0.75rem; color: #4b5563;">
                    <span>SHIPPING</span>
                    <span>Rp. 44.000</span>
                </div>
            </div>

            <hr style="margin: 1rem 0; border: none; border-top: 1px solid #e5e7eb;">

            <!-- Total -->
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                <span style="font-weight: 600;">TOTAL AMOUNT</span>
                <span style="font-size: 1.125rem; font-weight: 700;">Rp. 344.000</span>

            </div>
            
            <!-- Submit Button-->
            <button type="button" class=""
                style="width: 100%; padding: 0.875rem; background: #111827; color: white; font-weight: 600; border-radius: 0.5rem; 
                 border: none; cursor: pointer; margin-top: 1rem;">
                Pesan Sekarang
            </button>
        </div>
    </div>

</div>

@endsection