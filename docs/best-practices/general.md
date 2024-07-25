# General best practices 🤝

&ast;📈 _this means that it is also a rule in our linting package_

### ⚪ All code in English (en-us)
All code (including comments) must be written in English (en-us).

### ⚪ Do not use abbreviations
Using complete words results in more readable code. Not everyone knows all your abbreviations. Code is written only once, but read many times.

<details>
  <summary>✏️ Code Examples</summary>

  ```javascript
  👎 BAD
  const myArr = [1, 2, 3];
  const envs = ['development', 'accept', 'production'];
  const elAttr = document.body.getAttribute('style');

  for (let i = 0; i < myArr.length; i++) {
      for (let j = 0; j < envs.length; j++) {
          //
      }
  }
  ```

  ```javascript
  👍 GOOD
  const myArray = [1, 2, 3];
  const environments = ['development', 'accept', 'production'];
  const elementAttribute = document.body.getAttribute('style');

  for (let myArrayIndex = 0; myArrayIndex < myArray.length; myArrayIndex++) {
      for (let environmentIndex = 0; environmentIndex < environments.length; environmentIndex++) {
          //
      }
  }
  ```
</details>

### ⚪ Git commit message specification
We follow the conventional commits specification for commit messages. We always put the story or ticket id as scope between parenthesis after the type. See [conventionalcommits.org](https://conventionalcommits.org) for more information.
Example commit message: `feat(PRO-123): created user profile page`.

### ⚪ Trailing commas 📈
Always use trailing commas when possible. Trailing commas are useful when adding new code. For example if you want to add a new property to an array, you can add a new line without modifying the previously last line if that line already uses a trailing comma. This makes version-control diffs cleaner and editing code might be less troublesome.

<details>
  <summary>✏️ Code Examples</summary>

  ```javascript
  👎 BAD
  const countryCodes = {
    nl: 'Netherlands',
    lu: 'Luxembourg',
    be: 'Belgium'
  };
  ```

  ```javascript
  👍 GOOD
  const countryCodes = {
    nl: 'Netherlands',
    lu: 'Luxembourg',
    be: 'Belgium',
  };
  ```
</details>

### ⚪ Place enter above return statements
Place an enter above return statements if there is logic above it.

<details>
  <summary>✏️ Code Examples</summary>

  ```javascript
  👎 BAD
  function setLocale(locale) {
    currentLocale = locale;
    return locale;
  }
  ```

  ```javascript
  👍 GOOD
  function getLocale() {
    return currentLocale;
  }

  function setLocale(locale) {
    currentLocale = locale;

    return locale;
  }
  ```
</details>

### ⚪ Maximum 140 characters per line 📈
A maximum of 140 characters are allowed on one line. Feel free to stay below the maximum. You don't have to put as much as possible on one line. After all, it's all about readability.

### ⚪ Test descriptions must be on one line
Even if the test description exceeds the maximum number of characters per line, we do not place new lines in test descriptions. With the test description, we mean everything within `it()`.
