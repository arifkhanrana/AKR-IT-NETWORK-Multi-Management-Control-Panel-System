// VoucherController.php
public function generateVouchers(Request $request) {
    $validated = $request->validate([
        'prefix' => 'required|string',
        'quantity' => 'required|integer|min:1',
        'duration' => 'required|in:1h,1d,1w,1m',
        'data_limit' => 'nullable|integer'
    ]);
    
    $vouchers = [];
    for ($i = 0; $i < $validated['quantity']; $i++) {
        $code = $validated['prefix'] . Str::random(8);
        $vouchers[] = Voucher::create([
            'code' => $code,
            'duration' => $validated['duration'],
            'data_limit' => $validated['data_limit'],
            'status' => 'active'
        ]);
    }
    return response()->json($vouchers);
}