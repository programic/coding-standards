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
