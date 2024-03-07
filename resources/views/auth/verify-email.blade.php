<x-guest-layout>
    <div class="mb-4 text-md text-gray-100 text-center">
        <p>We sent an Email to {{Auth::user()->email}} Please Check the message and Activate your Account</p>
        <p class="pt-4">لقد تم أرسال رسالة التحقق الى البريد المذكور اعلاه الرجاء مراجعة البريد لتفعيل الحساب</p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}<br>
                   أعد أرسال رسالة التحقق
                    
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-100 hover:text-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
