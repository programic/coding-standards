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

### ⚪ Enum classes

When the number of values for an attribute is fixed and rarely changes, we use an Enum. For example, in the case of a Status of a certain model. The enum should also always contain a return type.

<details>
  <summary>✏️ Code Examples</summary>

  ```php
  👎 BAD
  if ($device->state === 'stand-by') {
    //
  }
  ```

  ```php
  👍 GOOD

  enum DeviceState : string
  {
    case STAND_BY = 'stand-by';
    case ON = 'on';
    case OFF = 'off';
  }

  class Device extends Model {
    protected $casts = [
      'type' => DeviceType::class,
    ];
  }

  if ($device->state === DeviceState::STAND_BY) {
    //
  }
  ```
</details>

### ⚪ Don't use `$with` in your model
Don't use the `$with` `property in your model and only eager load the relationships which are needed in the request.

<details>
  <summary>✏️ Code Examples</summary>

  ```php
  👎 BAD
  class Layout extends Model {
    protected $with = [
      'widgets'
    ];
  }
  ```

  ```php
  👍 GOOD
  class Layout extends Model {
    //
  }

  $layouts = Layout::with('widgets')->get();
  ```
</details>

### ⚪ Helper functions over facades

In Laravel you have the possibility to use Facades but often for the same results there are also helper functions. The preference is to use the helper function instead of the Facade.

<details>
  <summary>✏️ Code Examples</summary>

  ```php
  👎 BAD
  public function login() : User {
    $user = Auth::user();

    return $user;
  }
  ```

  ```php
  👍 GOOD
  public function login() : User {
    $user = auth()->user();

    return $user;
  }
  ```
</details>

### ⚪ Spread operator for merging arrays

There are several ways to merge an array. It is preferable to use a [spread operator](https://wiki.php.net/rfc/spread_operator_for_array) for merging an array.

<details>
  <summary>✏️ Code Examples</summary>

  ```php
  👎 BAD
  array_merge($record, [
    'author' => $member,
    'establishment' => $establishment,
  ]);
  ```

  ```php
  👍 GOOD
  $data = [
      ...$record,
      'author' => $member,
      'establishment' => $establishment,
  ];
  ```
</details>

### ⚪ Policies

Make sure to use policies to authorize the request. We use permissions in the policies to determine if an user can handle the request.

<details>
  <summary>✏️ Code Examples</summary>

  ```php
  👎 BAD
  public function update(UpdateArticleRequest $request, Article $article) {
    abort_unless($user->can('edit articles'), 403);
  }
  ```

  ```php
  👍 GOOD
  // ArticlePolicy.php
  class ArticlePolicy
  {
      use HandlesAuthorization;

      public function update(User $user, Article $article): bool
      {
          return $user->can('articles.edit') && $article->author->is($user);
      }
  }

  // AuthServiceProvider.php
  class AuthServiceProvider extends ServiceProvider
  {
      /**
       * The policy mappings for the application.
       *
       * @var array<class-string, class-string>
       */
      protected $policies = [
          Article::class => ArticlePolicy::class,
          //
      ];
  }


  // ArticleController.php
  public function __construct() {
    $this->authorizeResource(Article::class);
  }

  public function update(UpdateArticleRequest $request, Article $article) {
    //
  }
  ```
</details>

### ⚪ Writing tests

Each piece of code requires tests. Make sure to follow this rules:
- Only write code for the file not the underlying tests
- Make use of datasets, no loops in tests
- Expect values contain hardcoded values
- If it's a feature test make sure to use assertStatus as first expectValue


### ⚪ Follow Laravel naming conventions

Follow [PSR standards](https://www.php-fig.org/psr/psr-12/).

Also, follow naming conventions accepted by Laravel community, see:
https://github.com/alexeymezenin/laravel-best-practices/blob/master/README.md#follow-laravel-naming-conventions

