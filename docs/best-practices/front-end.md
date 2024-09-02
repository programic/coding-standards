# Front end best practices 🤝

&ast;📈 _this means that it is also a rule in our linting package_

### ⚪ Import order 📈
We place the imports in two groups:
1. Regular imports
2. Typed imports

For both groups, the following sorting order is maintained:
- First `node_modules`
- Then modules from the project that are imported via alias `@/`
- Then relative imports, for example: `../`

Type imports are always imported with `import type`. For example: `import type { Ref } from 'vue';`

<details>
  <summary>✏️ Code Examples</summary>

  ```javascript
  👎 BAD
  import  type { Ref } from 'vue';
  import { pick } from 'radash';
  import ParentComponent from '../ParentComponent.vue';
  import { computed, type Component } from 'vue';
  import AppButton from '@/components/AppButton.vue';
  import { shallowMount, type VueWrapper } from '@vue/test-utils';
  import ViewComponent from './ViewComponent.vue';
  ```

  ```javascript
  👍 GOOD
  import { pick } from 'radash';
  import { computed } from 'vue';
  import { shallowMount } from '@vue/test-utils';
  import AppButton from '@/components/AppButton.vue';
  import ParentComponent from '../ParentComponent.vue';
  import ViewComponent from './ViewComponent.vue';

  import type { Component, Ref } from 'vue';
  import type { VueWrapper } from '@vue/test-utils';
  ```
</details>

### ⚪ Translations
We always use translations when coding text that is displayed to the end user. In addition, we do not use translation keys, but complete English sentences/words. When the English translation is added, the Dutch translation must also be added immediately.

<details>
  <summary>✏️ Code Examples</summary>

  ```javascript
  👎 BAD
  const nl = {
    'users.overview.modal.title': 'Modal titel',
  };
  ```

  ```javascript
  👍 GOOD
  const nl = {
    'Modal title': 'Modal titel',
  };
  ```
</details>

### ⚪ Spaces surrounding a pipe
We put spaces around a pipe for extra readability.

<details>
  <summary>✏️ Code Examples</summary>

  ```typescript
  👎 BAD
  function getItem(): Item|null {
    ...
  }

  interface Item {
    key: string|number|null;
  }

  type Items = Item[]|undefined;
  ```

  ```typescript
  👍 GOOD
  function getItem(): Item | null {
    ...
  }

  interface Item {
    key: string | number | null;
  }

  type Items = Item[] | undefined;
  ```
</details>

### ⚪ Closing types in TypeScript with `;`
We always end a TypeScript property or type with `;`. We do this for extra readability and consistency.

<details>
  <summary>✏️ Code Examples</summary>

  ```typescript
  👎 BAD
  interface User {
    id: number
    email: string
  }

  type Users = User[]
  ```

  ```typescript
  👍 GOOD
  interface User {
    id: number;
    email: string;
  }

  type Users = User[];
  ```
</details>

### ⚪ Functions in Vue Composition API 📈
You can define a function in JavaScript with a function declaration or a function expression. When defining functions in the root of a Vue setup, we choose to always use function declarations instead of function expressions because of readability.

<details>
  <summary>✏️ Code Examples</summary>

  ```typescript
  👎 BAD
  const updateUser = () => {
    //
  };
  ```

  ```typescript
  👍 GOOD
  function updateUser() {
    //
  }
  ```
</details>

### ⚪ Naming of folders and files
We write the folder and file names in PascalCase, except for the root folders and `__tests__` folder. File names of test suites are written in kebab-case, so that they are easy to distinguish.

### ⚪ Use `await` instead of `.then`
We use `await` instead of `.then` to avoid the callback hell.

<details>
  <summary>✏️ Code Examples</summary>

  ```typescript
  👎 BAD
  async function editUser() {
    return new Promise(resolve => {
      updateUser().then(updatedUser => {
        resolve(updatedUser);
      });
    });
  }
  ```

  ```typescript
  👍 GOOD
  async function editUser() {
    const updatedUser = await updateUser();

    return updatedUser;
  }
  ```
</details>

### ⚪ Do not use "Interface" or "Type" suffixes in TypeScript type naming
We do not use the word “Interface” or “Type” in the name of an TypeScript type. Some people like to write this as a suffix by default, but we prefer not to. If you want to use the type somewhere and it gives a naming conflict with something else, then you do not alias the type but the thing with which the naming conflict is. See the example below.

<details>
  <summary>✏️ Code Examples</summary>

  ```typescript
  👎 BAD
  import Block from './Block.vue';
  import type { Block as BlockInterface } from '../blocks.d';

  interface SectionInterface {
    blockId: BlockInterface['id'];
  }
  ```

  ```typescript
  👍 GOOD
  import BlockComponent from './Block.vue';
  import type { Block } from '../blocks.d';

  interface Section {
    blockId: Block['id'];
  }
  ```
</details>

### ⚪ TypeScript `interface` is preferred over `type`
We use the TypeScript interface when possible, unless there is no other option. An example of when this is not possible is if you want to set primitive or tuple types directly as a type.

<details>
  <summary>✏️ Code Examples</summary>

  ```typescript
  👎 BAD
  type User = {
    id: number;
    name: string;
  };
  ```

  ```typescript
  👍 GOOD
  interface User {
    id: number;
    name: string;
  }

  type Roles = 'admin' | 'student';
  type PermissionsPerRole = Record<Roles, string[]>;

  /*
     Both type Record and type with dynamic key are valid.
     When writing the object syntax (below), we cannot use an interface.
     That is because a mapped type cannot be used as index in an
     interface, but it can be used as index in a normal type.
   */
  type PermissionsPerRole = {
    [key in Roles]: string[];
  };
  ```
</details>

### ⚪ Arrow functions
If the arrow function fits on one line, we do not use curly brackets for the callback. If multiple lines are needed (or if this makes it more readable), we use curly brackets as a callback in combination with a return.

We do make one exception: if an object or array is returned directly, we do not need to use brackets.

We always put the parameters of the callback on the line from which the callback is initiated (if possible).

<details>
  <summary>✏️ Code Examples</summary>

  ```typescript
  👎 BAD
  (answer) => {
    return ['yes', 'no'].includes(answer);
  }

  () => {
    return {
      name: 'Programic',
      isActive: true,
    };
  }
  ```

  ```typescript
  👍 GOOD
  (answer) => ['yes', 'no'].includes(answer);

  () => ({
    name: 'Programic',
    isActive: true,
  });
  ```
</details>

### ⚪ Use `ref` instead of `reactive`
We use `ref` instead of `reactive` for consistency. Also, it is not possible to completely overwrite a `reactive` and retain its reactivity.

<details>
  <summary>✏️ Code Examples</summary>

  ```typescript
  👎 BAD
  import { reactive } from vue;

  const user = reactive({ id: 1, name: string });
  ```

  ```typescript
  👍 GOOD
  import { ref } from vue;

  const user = ref({ id: 1, name: string });
  ```
</details>

### ⚪ Export composables directly as named export
We always export composable functions as named export, for consistency and to ensure people keep the name of the composable function when importing.

<details>
  <summary>✏️ Code Examples</summary>

  ```typescript
  👎 BAD
  export default function() {
    //
  }
  ```

  ```typescript
  👍 GOOD
  export function useScreen() {
    //
  }
  ```
</details>

### ⚪ Prefix composables with `use`
We always prefix composables with `use`. Both in the filename and the named export. This is also a best practice of Vue itself.

<details>
  <summary>✏️ Code Examples</summary>

  ```typescript
  👎 BAD
  export function screen() {
    //
  }
  ```

  ```typescript
  👍 GOOD
  export function useScreen() {
    //
  }
  ```
</details>

### ⚪ Do not mix Vue Options API with Composition API (or vice versa)
We do not mix the Vue Options API with the Composition API (or vice versa). We choose per project which Vue API we are going to use and stick to that. Every .vue file (or inline) must then adhere to the chosen API.

<details>
  <summary>✏️ Code Examples</summary>

  ```typescript
  👎 BAD
  const users = ref([]);

  defineComponent({
    name: 'UserIndex',

    methods: {
      updateUser(user) {
        const userIndex = users.value.findIndex(({ id }) => id === user.id);

        if (userIndex > -1) {
          users.value.splice(userIndex, 1, user);
        }
      },
    },
  });
  ```

  ```typescript
  👍 GOOD
  defineComponent({
    name: 'UserIndex',

    data() {
      return {
        users: [],
      };
    },

    methods: {
      updateUser(user) {
        const userIndex = this.users.findIndex(({ id }) => id === user.id);

        if (userIndex > -1) {
          this.users.splice(userIndex, 1, user);
        }
      },
    },
  });
  ```
</details>

### ⚪ Component usage in PascalCase
When using a component in e.g. the template, we write it in PascalCase. This also applies to the default components such as `Component`, `Transition`, `Teleport` etc.

<details>
  <summary>✏️ Code Examples</summary>

  ```vue
  👎 BAD
  <component :is="..." />
  <transition>...</transition>
  <teleport>...</teleport>
  ```

  ```vue
  👍 GOOD
  <Component :is="..." />
  <Transition>...</Transition>
  <Teleport>...</Teleport>
  ```
</details>

### ⚪ Vue emit event name always in camelCase
The event name (first parameter) of a Vue emit, we write in camelCase. When we are going to listen for it in the template, we write it in kebab-case.

<details>
  <summary>✏️ Code Examples</summary>

  ```typescript
  👎 BAD
  // Checkbox.vue
  const emit = defineEmits<{
    'Update:modelValue': boolean;
    'is-changed': void;
  }>();

  emit('Update:model-value', true);
  emit('is-changed');

  // Parent.vue
  <template>
    <Checkbox @update:modelValue="..." @isChanged="..." />
  </template>
  ```

  ```typescript
  👍 GOOD
  // Checkbox.vue
  const emit = defineEmits<{
    'update:modelValue': boolean;
    isChanged: void;
  }>();

  emit('update:modelValue', true);
  emit('isChanged');

  // Parent.vue
  <template>
    <Checkbox @update:model-value="..." @is-changed="..." />
  </template>
  ```
</details>

### ⚪ Do not close listeners in template with a `;`
When defining a listener in a template, we do not close it with a `;`.

<details>
  <summary>✏️ Code Examples</summary>

  ```vue
  👎 BAD
  <div @blur="$toast.clear();"></div>
  ```

  ```vue
  👍 GOOD
  <div @blur="$toast.clear()"></div>
  ```
</details>

### ⚪ Use symbols when using provide/inject
We always use symbols as keys for provide/inject. This way we keep it simple for working in applications with multiple developers. Another advantage when using symbols is we keep it properly typed. It is recommended to export all symbols that are used for provide/inject in a single file. A default value when injecting is also recommended.

<details>
  <summary>✏️ Code Examples</summary>

  ```typescript
  👎 BAD
  import { provide, inject } from 'vue';

  provide('user', user);

  const user = inject('user');
  ```

  ```typescript
  👍 GOOD
  // Tokens.ts
  import type { InjectionKey, Ref } from 'vue';
  import type { User } from '~/typings/user.d';

  export const userToken: InjectionKey<Ref<User>> = symbol('userToken');

  // Ancestor.vue
  import { provide, ref } from 'vue';
  import { userToken } from '~/Tokens';

  import type { User } from '~/typings/user.d';

  const user = ref<User>({ id: 1, name: 'John Doe' });
  provide(userToken, user);

  // Child.vue
  import { inject } from 'vue';
  import { userToken } from '~/Tokens';

  const user = inject(userToken, null);
  ```
</details>

### ⚪ Prefer optional chaining over multiple if statements
Use optional chaining whenever possible. It increases readability and shortens your code.

<details>
  <summary>✏️ Code Examples</summary>

  ```typescript
  👎 BAD
  interface User {
    id: number;
    name?: {
      first?: string;
      last?: string;
    };
    phoneNumber?: number;
  }

  const user: User | null = null;
  let message = 'Welcome';

  if (user && user.name && user.name.first) {
    message = `Hi ${user.name.first}`;
  }

  if (user && user.phoneNumber) {
    //
  }
  ```

  ```typescript
  👍 GOOD
  interface User {
    id: number;
    name?: {
      first?: string;
      last?: string;
    };
    phoneNumber?: number;
  }

  const user: User | null = null;
  const message = user?.name?.first ? `Hi ${user.name.first}` : 'Welcome';

  if (user?.phoneNumber) {
    //
  }
  ```
</details>

### ⚪ Only put generic components in the `src/components` folder
We only put generic components in the `src/components` folder. So don't put layout, views or page components in there.

### ⚪ Prefix generic components with `App`
We prefix generic components with 'App'. Then you get AppAlert or AppButton, for example.

### ⚪ Always use `shallowMount` instead of `mount`
We always use a `shallowMount` instead of a `mount` in the front-end tests. We do this so that you get as few dependencies as possible. An exception may be made with `mount` if the option `shallow` is set to `true`. This can be useful if a specific component should not be stubbed.

<details>
  <summary>✏️ Code Examples</summary>

  ```typescript
  👎 BAD
  import { mount } from '@vue/test-utils';

  const wrapper = mount(AppButton);
  ```

  ```typescript
  👍 GOOD
  import { mount, shallowMount } from '@vue/test-utils';

  const wrapper = shallowMount(AppButton);
  const wrapper = mount(AppButton, {
    shallow: true,
  });
  ```
</details>

### ⚪ Only test the component itself
You should only test the component itself, including the input and output. So don't test the underlying components, create a separate test for that. In component testing, input means: props and injects. In component testing, output means: the rendered DOM, outgoing requests and outgoing events.

### ⚪ Always test what the situation is like now before you test what the situation is like after certain changes
If you want to test a certain situation after e.g. a change, you should first test how the situation is now. This ensures that you don't get false/positives.

<details>
  <summary>✏️ Code Examples</summary>

  ```typescript
  👎 BAD
  const httpFetchMock = vi.fn();

  it('should fetch the user on component mount', () => {
    const wrapper = shallowMount(UserShow, {
      global: { mocks: { fetch: httpFetchMock } },
    });

    expect(httpFetchMock).toHaveBeenCalledTimes(1);
  });
  ```

  ```typescript
  👍 GOOD
  const httpFetchMock = vi.fn();

  afterEach(() => {
    httpFetchMock.mockClear();
  });

  it('should fetch the user on component mount', () => {
    expect(httpFetchMock).not.toHaveBeenCalled();

    const wrapper = shallowMount(UserShow, {
      global: { mocks: { fetch: httpFetchMock } },
    });

    expect(httpFetchMock).toHaveBeenCalledTimes(1);
  });
  ```
</details>

### ⚪ Always put mock data in a separate mocks file
We always put mock data in a separate file, so that the test is not polluted by it and the test files remain smaller. The names of the mock variables and functions may not end with 'Mock'.

<details>
  <summary>✏️ Code Examples</summary>

  ```typescript
  👎 BAD
  // __tests__/user.spec.ts
  const userMock = { id: 1, name: 'John Doe' };

  httpFetchMock.mockResolvedValue(userMock);

  it(...);
  ```

  ```typescript
  👍 GOOD
  // __mocks__/user.mock.ts
  export const user = { id: 1, name: 'John Doe' };

  // __tests__/user.spec.ts
  import { user as userMock } from '../__mocks__/user.mock';

  httpFetchMock.mockResolvedValue(userMock);

  it(...);
  ```
</details>

### ⚪ Use alias when importing mocks
When importing mocks we always use an alias: `{mockName}Mock`.

<details>
  <summary>✏️ Code Examples</summary>

  ```typescript
  👎 BAD
  import { user, getCompany } from '../__mocks__/user.mock';
  ```

  ```typescript
  👍 GOOD
  import { user as userMock, getCompany as getCompanyMock } from '../__mocks__/user.mock';
  ```
</details>

### ⚪ Test description on one line
We write the test description on 1 line. So we don't use enters to comply with the max-len linting rule.
