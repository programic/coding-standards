# Back end best practices 🤝

&ast;📈 _this means that it is also a rule in our linting package_

### ⚪ Database foreign keys
We use foreign keys in the migrations if the model has a relationship to an other table.

<details>
  <summary>✏️ Code Examples</summary>

  ```php
  👎 BAD
  Schema::table('layouts', function (Blueprint $table): void {
      $table->unsignedBigInteger('author_id');
  });
  ```

  ```php
  👍 GOOD
  Schema::table('layouts', function (Blueprint $table): void {
      $table->foreignIdFor(User::class, 'author_id')->constrained();
  });
  ```
</details>

### ⚪ Order of controller method parameters
We use a order of the controller method parameters:
1. FormRequest / DTO
2. Repository
3. Model
4. Other Parameters

<details>
  <summary>✏️ Code Examples</summary>

  ```php
  👎 BAD
  public function update(Job $job, JobData $data): Resource
  {
     //
  }

  // OR:

  public function update(Job $job, UpdateJobRequest $request): Resource
  {
     //
  }

  // OR:

  public function update(FloorRepository $repository, IndexRequest $request, Establishment $establishment): Resource
  {
     $repository->findFloorsByEstablishment($establishment, $request);
  }

  ```

  ```php
  👍 GOOD
  public function update(JobData $data, Job $job): Resource
  {
     //
  }

  // OR:

  public function update(UpdateJobRequest $request, Job $job): Resource
  {
     //
  }

  // OR:

  public function update(IndexRequest $request, FloorRepository $repository, Establishment $establishment): Resource
  {
     $repository->findFloorsByEstablishment($establishment, $request);
  }
  ```
</details>

### ⚪ Do not get data from the `.env` file directly

Pass the data to config files instead and then use the `config()` helper function to use the data in an application.

<details>
  <summary>✏️ Code Examples</summary>

  ```php
  👎 BAD
  $apiKey = env('API_KEY');
  ```

  ```php
  👍 GOOD
  // config/api.php
  'key' => env('API_KEY'),

  // Use the data
  $apiKey = config('api.key');
  ```
</details>

### ⚪ Use `$fillable` over `$guarded` in Models
Make sure to set the `fillable` property on the model to determine which columns can be mass assigned.

<details>
  <summary>✏️ Code Examples</summary>

  ```php
  👎 BAD
  /** @var array<int, string> */
  protected $guarded = [
    'id'
  ];
  ```

  ```php
  👍 GOOD
  /** @var array<int, string> */
  protected $fillable = [
    'name', 'description'
  ];
  ```
</details>

### ⚪ Validation rules in classes

Move validation from controllers to Request or DTO classes.

#### Request Classes
- String notation as much as possible
- Make use of `snake_case` for the keys

#### DTO
- Make use of the PHP 8 attributes. See: https://spatie.be/docs/laravel-data/v4/validation/using-validation-attributes.

<details>
  <summary>✏️ Code Examples</summary>

```php
👎 BAD
public function store(Request $request)
{
    $request->validate([
        'title' => 'required|unique:posts|max:255',
        'body' => 'required',
        'publish_at' => 'nullable|date',
    ]);

    ...
}
```

```php
👍 GOOD
public function store(PostRequest $request)
{
    ...
}

class PostRequest extends Request
{
    public function rules(): array
    {
        return [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'publish_at' => 'nullable|date',
        ];
    }
}

// OR:

public function store(PostData $data)
{
    ...
}

use Spatie\LaravelData\Data;

class PostData extends Data
{
    public function __construct(
        #[Unique('posts', ignore: new RouteParameterReference('post', 'title'))]
        public string $title,
        public string $body,
        #[After('now')]
        public string|Carbon $publishAt,
    ) {
    }


    public function rules(): array
    {
        return [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'publish_at' => 'nullable|date',
        ];
    }
}

```
</details>


### ⚪ Use `validated` or `safe` when working with validated data

When there is an endpoint that uses the request data, always use a FormRequest in which the request is validated.

> ⚠️ **NOTE**: Only relevant when using FormRequests

<details>
  <summary>✏️ Code Examples</summary>

```php
👎 BAD
public function store(StorePostRequest $request)
{
    $data = $request->get('name', 'email');
}
```

```php
👍 GOOD
public function store(StorePostRequest $request)
{
    // Retrieve the validated input data...
    $validated = $request->validated();

    // Retrieve a portion of the validated input data...
    $validated = $request->safe()->only(['name', 'email']);
    $validated = $request->safe()->except(['name', 'email']);
}
```
</details>
