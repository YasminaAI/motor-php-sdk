# Reference
## Quotes
<details><summary><code>$client-&gt;quotes-&gt;showQuote($id) -> ?QuoteResponse</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->quotes->showQuote(
    1,
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;quotes-&gt;deleteQuote($id) -> ?DeleteQuoteRequestsIdResponse</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->quotes->deleteQuote(
    1,
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;quotes-&gt;listQuotes() -> ?GetQuoteRequestsResponse</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->quotes->listQuotes();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;quotes-&gt;requestQuotes($request) -> ?QuoteResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

For getting prices with benefits. 
The Quote IDs can be used later to issue a policy
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->quotes->requestQuotes(
    new PostQuoteRequestsRequest([
        'ownerId' => 'owner_id',
        'phone' => 'phone',
        'birthdate' => new DateTime('2023-01-15'),
        'carSequenceNumber' => 'car_sequence_number',
        'carEstimatedCost' => 1.1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$ownerId:** `string` — Owner ID must be 10 digits starting with 1, 2, or 7
    
</dd>
</dl>

<dl>
<dd>

**$email:** `?string` — Email address must be valid and belongs to the customer
    
</dd>
</dl>

<dl>
<dd>

**$phone:** `string` — Phone number must start with 05 and be 10 digits
    
</dd>
</dl>

<dl>
<dd>

**$birthdate:** `DateTime` — Birthdate in YYYY-MM-DD format
    
</dd>
</dl>

<dl>
<dd>

**$carSequenceNumber:** `string` — Car sequence number must be 8 or 9 digits
    
</dd>
</dl>

<dl>
<dd>

**$isOwnershipTransfer:** `?bool` — Indicates if the ownership is being transferred
    
</dd>
</dl>

<dl>
<dd>

**$currentCarOwnerId:** `?string` — Required if is_ownership_transfer is true; 10 digits starting with 1,2,7
    
</dd>
</dl>

<dl>
<dd>

**$carEstimatedCost:** `float` — Estimated cost of the car
    
</dd>
</dl>

<dl>
<dd>

**$carModelYear:** `?int` — Car model year between 1950 and next year
    
</dd>
</dl>

<dl>
<dd>

**$startDate:** `?DateTime` — Desired policy start date in YYYY-MM-DD. Must be between tomorrow and 28 days from today (inclusive). The platform validates this range server-side.
    
</dd>
</dl>

<dl>
<dd>

**$drivers:** `?array` — List of drivers for the vehicle. When provided, the sum of all driving_percentage values must equal 100, and the owner must be included among the drivers.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Policies
<details><summary><code>$client-&gt;policies-&gt;showPolicy($carPolicy) -> ?Policy</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Show a specific policy
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->policies->showPolicy(
    1,
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$carPolicy:** `int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;policies-&gt;listPolicies($request) -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Listing requested policies
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->policies->listPolicies(
    new GetPoliciesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$quoteRequestId:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$quotePriceId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$providerPolicyId:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$carSequenceNumber:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$newOwnerId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$previousOwnerId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$minPrice:** `?float` 
    
</dd>
</dl>

<dl>
<dd>

**$maxPrice:** `?float` 
    
</dd>
</dl>

<dl>
<dd>

**$perPage:** `?int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;policies-&gt;issuePolicy($request) -> ?Policy</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

For issuing a new policy
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->policies->issuePolicy(
    new PostPoliciesRequest([
        'quoteRequestId' => 123,
        'quoteReferenceId' => '550e8400-e29b-41d4-a716-446655440000',
        'quotePriceId' => '550e8400-e29b-41d4-a716-446655440001',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$quoteRequestId:** `int` — ID of the car quote request
    
</dd>
</dl>

<dl>
<dd>

**$quoteReferenceId:** `string` — Unique identifier for the quote reference ID (coming from POST /quote-requests)
    
</dd>
</dl>

<dl>
<dd>

**$quotePriceId:** `string` — Unique identifier for the quote price ID that exists inside a quote item (coming from POST /quote-requests)
    
</dd>
</dl>

<dl>
<dd>

**$benefits:** `?array` — List of benefit UUIDs
    
</dd>
</dl>

<dl>
<dd>

**$extraFields:** `?array` — Optional free-form object with additional fields. Total JSON-encoded size must not exceed 255 characters.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## OtPs
<details><summary><code>$client-&gt;otPs-&gt;requestOtpForQuoteVerification($request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

This endpoint sends a one-time password (OTP) to the provided email and phone number for quote verification. It should be called before creating a quote request.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->otPs->requestOtpForQuoteVerification(
    new PostQuoteOtpRequest([
        'email' => 'someone@example.com',
        'phone' => '0501234567',
        'ownerId' => '1012345678',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$email:** `string` — Email address of the car owner
    
</dd>
</dl>

<dl>
<dd>

**$phone:** `string` — Phone number starting with 05 and containing 10 digits
    
</dd>
</dl>

<dl>
<dd>

**$ownerId:** `string` — National ID or Iqama ID of the car owner (10 digits)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;otPs-&gt;requestOtpForIssuingPolicy($request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

This endpoint sends a one-time password (OTP). It should be called before issuing a policy.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->otPs->requestOtpForIssuingPolicy(
    new PostIssueOtpRequest([
        'email' => 'someone@example.com',
        'phone' => '0501234567',
        'ownerId' => '1012345678',
        'quoteRequestId' => 123,
        'quoteReferenceId' => '550e8400-e29b-41d4-a716-446655440000',
        'quotePriceId' => '550e8400-e29b-41d4-a716-446655440001',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$email:** `string` — Email address of the car owner
    
</dd>
</dl>

<dl>
<dd>

**$phone:** `string` — Phone number starting with 05 and containing 10 digits
    
</dd>
</dl>

<dl>
<dd>

**$ownerId:** `string` — National ID or Iqama ID of the car owner (10 digits)
    
</dd>
</dl>

<dl>
<dd>

**$quoteRequestId:** `int` — ID of the car quote request
    
</dd>
</dl>

<dl>
<dd>

**$quoteReferenceId:** `string` — Unique identifier for the quote reference ID (coming from POST /quote-requests)
    
</dd>
</dl>

<dl>
<dd>

**$quotePriceId:** `string` — Unique identifier for the quote price ID that exists inside a quote item (coming from POST /quote-requests)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

