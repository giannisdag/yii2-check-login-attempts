# yii2-check-login-attempts
this is a checker for login attempts

based on https://github.com/ethercreative/yii2-login-attempts-behavior

## Installation

The preferred way to install this extension is through composer.
Either run

composer require giannisdag/yii2-check-login-attempts

or add

"giannisdag/yii2-check-login-attempts": "*"

to the require section of your composer.json file.

## Usage
Run the following migration

```php
php yii migrate --migrationPath="vendor/giannisdag/yii2-check-login-attempts/src/migrations"  --interactive=0
```
Add the behavior to your login model
```php
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        
        $behaviors[] = [
             'class' => '\giannisdag\yii2CheckLoginAttempts\behaviors\LoginAttemptBehavior',
            
            // Amount of attempts in the given time period
            'attempts' => 3,
            
            // the duration, in seconds, for a regular failure to be stored for
            // resets on new failure
            'duration' => 300,
            
            // the duration, in seconds, to disable login after exceeding `attemps`
            'disableDuration' => 900,
            
            // the attribute used as the key in the database
            // and add errors to
            'usernameAttribute' => 'username',
            
            // the attribute to check for errors
            'passwordAttribute' => 'password',
            
            // the validation message to return to `usernameAttribute`
            'message' => Yii::t('app', 'Login disabled'),
        ];
        
        return $behaviors;
    }
