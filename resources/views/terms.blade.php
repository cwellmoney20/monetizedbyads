@section('title', 'Terms and Conditions')
@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-4">
    <h1 id="terms" class="text-3xl font-bold mb-6">Terms</h1>
    <p class="mb-6">These Terms and Conditions (“Terms”) govern your use of the {{ config('app.name') }} website and services. By using the {{ config('app.name') }} website and services, you agree to be bound by these Terms. If you do not agree to these Terms, you may not use the {{ config('app.name') }} website or services.</p>

    <h2 id="acceptable-use" class="text-2xl font-semibold mb-4">Acceptable Use</h2>
    <p class="mb-6">You may not use the {{ config('app.name') }} website or services for any illegal or unauthorized purpose. You may not use the {{ config('app.name') }} website or services in a way that violates any laws or regulations in your jurisdiction.</p>

    <h2 id="purchases" class="text-2xl font-semibold mb-4">Purchases</h2>
    <p class="mb-6">If you purchase a subscription to {{ config('app.name') }}, you agree to pay the subscription fee in accordance with the payment terms in effect at the time of purchase. You agree to pay all applicable taxes. You agree that your subscription will automatically renew at the end of the subscription period, and you authorize us to charge your payment method for the renewal fee. You may cancel your subscription at any time by contacting us.</p>

    <h2 id="refunds" class="text-2xl font-semibold mb-4">Refunds</h2>
    <p class="mb-6">We do not offer refunds for purchases of subscriptions to {{ config('app.name') }}.</p>

    <h2 id="availability" class="text-2xl font-semibold mb-4">Availability</h2>
    <p class="mb-6">We make no guarantee that the {{ config('app.name') }} website or services will be available at all times. We may suspend or terminate your access to the {{ config('app.name') }} website or services at any time for any reason.</p>

    <h2 id="accounts" class="text-2xl font-semibold mb-4">Accounts</h2>
    <p class="mb-4">When you create an account on the {{ config('app.name') }} website, you agree to provide accurate and complete information. You agree to update your account information if it changes.</p>
    <p class="mb-4">You are responsible for maintaining the security of your account and password. You are responsible for all activities that occur under your account. You agree to notify us immediately of any unauthorized use of your account.</p>
    <p class="mb-4">You agree not to disclose your account credentials to any third party.</p>
    <p class="mb-6">You may not use as a username the name of another person or entity or that is not lawfully available for use, a name or trademark that is subject to any rights of another person or entity other than you, without appropriate authorization. You may not use as a username any name that is offensive, vulgar or obscene.</p>

    <h2 id="limitation-of-liability" class="text-2xl font-semibold mb-4">Limitation of Liability</h2>
    <p class="mb-6">In no event will {{ config('app.name') }} be liable to you for any indirect, consequential, exemplary, incidental, special or punitive damages, including lost profits, even if {{ config('app.name') }} has been advised of the possibility of such damages.</p>

    <h2 id="indemnification" class="text-2xl font-semibold mb-4">Indemnification</h2>
    <p class="mb-6">You agree to indemnify and hold {{ config('app.name') }} harmless from any claim or demand, including reasonable attorneys’ fees, made by any third party due to or arising out of your breach of these Terms or the documents they incorporate by reference, or your violation of any law or the rights of a third party.</p>

    <h2 id="disclaimer" class="text-2xl font-semibold mb-4">Disclaimer</h2>
    <p class="mb-4">Your use of the {{ config('app.name') }} website and services is at your sole risk. The {{ config('app.name') }} website and services are provided on an “AS IS” and “AS AVAILABLE” basis. {{ config('app.name') }} expressly disclaims all warranties of any kind, whether express or implied, including, but not limited to the implied warranties of merchantability, fitness for a particular purpose and non-infringement.</p>
    <p class="mb-6">{{ config('app.name') }} makes no warranty that (i) the {{ config('app.name') }} website or services will meet your requirements, (ii) the {{ config('app.name') }} website or services will be uninterrupted, timely, secure, or error-free, (iii) the results that may be obtained from the use of the {{ config('app.name') }} website or services will be accurate or reliable, or (iv) the quality of any products, services, information, or other material purchased or obtained by you through the {{ config('app.name') }} website or services will meet your expectations.</p>

    <h2 id="governing-law" class="text-2xl font-semibold mb-4">Governing Law</h2>
    <p class="mb-4">These Terms shall be governed and construed in accordance with the laws of United Kingdom, without regard to its conflict of law provisions.</p>
    <p class="mb-6">Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service, and supersede and replace any prior agreements we might have between us regarding the Service.</p>

    <h2 id="changes-to-these-terms" class="text-2xl font-semibold mb-4">Changes to These Terms</h2>
    <p class="mb-4">We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material we will try to provide at least 30 days notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.</p>
    <p class="mb-6">By continuing to access or use our Service after those revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, please stop using the Service.</p>

    <h2 id="contact-us" class="text-2xl font-semibold mb-4">Contact Us</h2>
    <p class="mb-6">If you have any questions about these Terms, please contact us.</p>
</div>


@endsection
