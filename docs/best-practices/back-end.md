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

### ⚪ Constructor property promotion
If PHP8 is available within the project, we use [Constructor property promotion](https://www.php.net/manual/en/language.oop5.decon.php#language.oop5.decon.constructor.promotion), which means we no longer need to define properties above a class. These properties only need to be in the constructor if they also need to be changed during the initialization of a class. Especially useful for a DTO.

<details>
  <summary>✏️ Code Examples</summary>

  ```php
  👎 BAD
  class OrderItemData
  {
      public CaregroupMaterial $caregroupMaterial;
      public float $quantity;

      public function __construct(
          CaregroupMaterial $caregroupMaterial,
          float $quantity,
      ) {
          $this->caregroupMaterial = $caregroupMaterial;
          $this->quantity = $quantity;
      }
  }
  ```

  ```php
  👍 GOOD
  class OrderItemData
  {
      public function __construct(
          public CaregroupMaterial $caregroupMaterial,
          public float $quantity,
      ) {
          //
      }
  }
  ```
</details>

### ⚪ Policies

Make sure to use [policies](https://laravel.com/docs/master/authorization#creating-policies) to authorize the request. We use permissions in the policies to determine if an user can handle the request.

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

### ⚪ Query Classes for index endpoints

When data needs to be retrieved for an index page, we use a repository. A repository defines what can be sorted and how this should be done. In addition, pagination and search functionality can be implemented here:

- Extend a repository class from `Programic\Repository\BaseRepository` class, see: https://github.com/programic/laravel-repository/tree/master
- Add public function `fromRequest` that accepts the `IndexRequest` as the first parameter if pagination is used
- Use in controller by means of binding

<details>
  <summary>✏️ Code Examples</summary>

  ```php
  👎 BAD
  // EstablishmentController.php
  public function index(IndexRequest $request) {
     $establishments = Establishment::query()
            ->when($request->input('sortBy'), fn ($query) => $query->orderBy('name'))
            ->paginate($request->input('per_page'));

     return new EstablishmentResourceCollection($establishments);
  }
  ```

  ```php
  👍 GOOD
  // EstablishmentRepository.php
  class EstablishmentRepository extends BaseRepository
  {
      private const DEFAULT_PER_PAGE = 50;

      public function fromRequest(IndexRequest $request): LengthAwarePaginator
      {
          $perPage = $request->input('per_page', self::DEFAULT_PER_PAGE);

          return QueryBuilder::for(Establishment::query())
              ->allowedSorts(['name'])
              ->paginate($perPage);
      }
  }

  // EstablishmentController.php
  public function index(IndexRequest $request, EstablishmentRepository $establishmentRepository): EstablishmentResourceCollection
  {
      return new EstablishmentResourceCollection($establishmentRepository->fromRequest($request));
  }
  ```
</details>

### ⚪ Action Classes

For all mutations that are done, we create an action class. We do this so that we can reuse action classes in multiple places like other actions and not all logic ends up in the controllers. And it's more testable this way:

- Make sure to extend the `AsAction` trait of [laravel-actions](https://github.com/lorisleiva/laravel-actions) package.

<details>
  <summary>✏️ Code Examples</summary>

  ```php
  👎 BAD
  // DeviceController.php
  public function link(DeviceLinkRequest $request, Device $device): Response
  {
      $device->update(['device_link' => $request->validated('device_link')]);
  }
  ```

  ```php
  👍 GOOD
  // LinkDeviceAction.php
  use App\Models\Device\Device;
  use Lorisleiva\Actions\Concerns\AsAction;

  class LinkDeviceAction
  {
    use AsAction;

    public function handle(Device $device, string $deviceLink): Device
    {
        $device->update(['device_link' => $deviceLink]);

        return $device;
    }
  }

  // DeviceController.php
  public function link(DeviceLinkRequest $request, Device $device): Response
  {
        LinkDeviceAction::make()->handle($device, $request->validated('device_link'));
  }
  ```
</details>

### ⚪ DataTransferObject over an associative array
To gain more control over how data is sent to an [action](#-actions) or other methods, we use DataTransferObjects:

- Extends `Data` class from [Spatie Laravel Data](https://spatie.be/docs/laravel-data/v3/introduction)

<details>
  <summary>✏️ Code Examples</summary>

  ```php
    👎 BAD
    // UserLoginAction.php
    public function handle(array $user): string|bool
    {
        $attempt = auth()->attempt([
            'email' => $user['email'],
            'password' => $user['password'],
        ]);
    }
  ```

  ```php
    👍 GOOD
    // UserCredentialsData.php
    use Spatie\LaravelData\Data;

    class UserCredentialsData extends Data
    {
        public function __construct(
            public string $email,
            public string $password,
        ) {
            //
        }
    }

   // UserLoginAction.php
   public function handle(UserCredentialsData $user): string|bool
   {
        $attempt = auth()->attempt([
            'email' => $user->email,
            'password' => $user->password,
        ]);
    }
  ```
</details>

### ⚪ API Resources

Use an [API resource](https://laravel.com/docs/master/eloquent-resources#concept-overview) class when a resource or collection of resources is returned in the controller:
- Keys in the toArray method are `camelCase`
- Only send data that will actually be used
- Use `$this→when()` if key is not always present

<details>
  <summary>✏️ Code Examples</summary>

  ```php
  👎 BAD
  // UserController.php
  public function show(User $user): JsonResponse
  {
      return response()->json([
         'id' => $user->id,
         'full_name' => $user->full_name,
         'email' => $user->email,
      ]);
  }
  ```

  ```php
  👍 GOOD
  // UserResource.php
  class UserResource extends JsonResource
  {
      /**
       * @param Request $request
       * @return array<string, mixed>
       */
      public function toArray($request): array
      {
          return [
              'id' => $this->id,
              'fullName' => $this->full_name,
              'email' => $this->email,
              'company' => $this->when(auth()->user()->isAdmin(), function () {
                   return $this->company->name;
              }),
          ];
      }
  }

  // UserController.php
  public function show(User $user): UserResource
  {
      return new UserResource($user);
  }
  ```
</details>

### ⚪ Observers

Make sure to use an [Observer](https://laravel.com/docs/master/eloquent#observers) class when listen to model events.

<details>
  <summary>✏️ Code Examples</summary>

  ```php
  👎 BAD
  class User extends Model
  {
      /**
       * The "booted" method of the model.
       */
      protected static function booted(): void
      {
          static::created(function (User $user) {
              // ...
          });
      }
  }
  ```

  ```php
  👍 GOOD
  class UserObserver
  {
  /**
   * Handle the User "created" event.
   */
  public function created(User $user): void
  {
      // ...
  }
  ```
</details>

### ⚪ Migrations

Use [migrations](https://laravel.com/docs/master/migrations) to update or create the database structure:
- Use the up & down method
- Use [anonymous classes](https://www.php.net/manual/en/language.oop5.anonymous.php) in migration
- Mutate only one table per migration

Make a [Task](#-tasks) when creating or updating the data in an existing table.

<details>
  <summary>✏️ Code Examples</summary>

  ```php
  👍 GOOD
  use Programic\Tasks\Facades\Task;
  use Programic\Tasks\TaskMigration;

  return new class() extends TaskMigration {
    public function up(): void
    {
        Task::noFresh(function (): void {
            Device::whereNotNull('key')->update(['created_by' => CreatedBy::NEXUDUS]);

            Device::whereNull('key')->update(['created_by' => CreatedBy::SYSTEM]);
        });
    }

    public function down(): void
    {
        Device::where('id', '>', 0)->update(['created_by' => '']);
    }
};
  ```
</details>

### ⚪ Tasks
If data needs to be updated during a release due to a change in the database, this should be offered as a task so that it is run automatically during a “migrate”.

- Files are in `tasks` folder.
- Extend [TaskMigration](https://github.com/programic/laravel-task/blob/master/src/TaskMigration.php) class of [programic task package](https://github.com/programic/laravel-task)
- Set up up method in `Task::noFresh` or `Task::fresh` closure
- Set up down method if possible

<details>
  <summary>✏️ Code Examples</summary>

  ```php
  return new class() extends Migration {
      /**
       * Run the migrations.
       */
      public function up(): void
      {
          Schema::create('personal_access_tokens', function (Blueprint $table): void {
              $table->id();
              $table->morphs('tokenable');
              $table->string('name');
              $table->string('token', 64)->unique();
              $table->text('abilities')->nullable();
              $table->timestamp('last_used_at')->nullable();
              $table->timestamps();
          });
      }

      /**
       * Reverse the migrations.
       */
      public function down(): void
      {
          Schema::dropIfExists('personal_access_tokens');
      }
  };
  ```
</details>

### ⚪ Seeders

[Seeders](https://laravel.com/docs/master/seeding#writing-seeders) are written to quickly set up a development environment and to ensure that testing can be done properly when new functionalities are built. It is important that this data resembles production data as much as possible. We only write seeders for models that need to be tested:

- Write a seeder when a new functionality has been built that needs to be tested with data that does not yet exist
- Write a seeder that is representative (do not make an exact copy of production data)

<details>
  <summary>✏️ Code Examples</summary>

  ```php
  class UserSeeder extends Seeder
  {
      public function run(): void
      {
          $user = User::updateOrCreate(
              [
                  'email' => 'test+mrgreen-admin@programic.com',
              ],
              [
                  'name' => 'Super Admin',
                  'password' => bcrypt('mrgreen'),
                  'email_verified_at' => now(),
                  'last_login' => now(),
              ],
          );

          // Or use a factory:

          User::factory()->times(3)->create();
      }
  ```
</details>

### ⚪ Tests

Each piece of code requires tests. Make sure to follow this rules:
- Only write code for the file not the underlying tests
- Make use of datasets, no loops in tests
- Expect values contain hardcoded values
- If it's a feature test make sure to use assertStatus as first expectValue

<details>
  <summary>✏️ Code Examples</summary>

  ```php
  it('can search by website', function ($searchString): void {
    getJson("/api/companies?filter[search_string]=$searchString")
        ->assertStatus(200)
        ->assertJsonCount(1, 'data')
        ->assertJsonPath('data.0.id', 1);
})->with([
    'testwebsite',
    'www.testwebsite.com',
    'https://www.testwebsite.com',
]);
  ```
</details>

### ⚪ Named arguments
Named arguments may be used to improve readability, but only when the values passed match the default values defined in the function signature. This makes the intention clearer without overriding behavior.
Using named arguments when the values are equal to their defaults documents intent and avoids confusion for readers who might assume you're overriding default behavior.

<details>
  <summary>✏️ Code Examples</summary>

  ```php
  👎 BAD
  function createUser(string $name, string $role = 'user', bool $active = true): void
  {
      // ...
  }

  createUser(role: 'admin', name: 'Bob');
  ```

  ```php
  👍 GOOD
  function createUser(string $name, string $role = 'user', bool $active = true): void
  {
      // ...
  }

  createUser(name: 'Alice', active: false);
  ```
</details>

### ⚪ Follow Laravel naming conventions

Follow [PSR standards](https://www.php-fig.org/psr/psr-12/).

Also, follow naming conventions accepted by Laravel community, see:
https://github.com/alexeymezenin/laravel-best-practices/blob/master/README.md#follow-laravel-naming-conventions

