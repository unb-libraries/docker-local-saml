# unb-libraries/docker-simplesamlphp
A Docker image to mock local SAML authentication using SimpleSAMLPHP.

## Usage
```yml
services:
  # ...

  idp-myproject-lib-unb-ca:
    image: ghcr.io/unb-libraries/simplesamlphp
    container_name: idp.myproject.lib.unb.ca
    restart: unless-stopped
    env_file:
      - ./env/saml.env
    networks:
      - unbgeology.lib.unb.ca
    ports:
      - 8080:8080
      - 8443:8443
```

The ```./env/saml/env``` should provide the following environment variable values:

```sh
# A unique identifier of your local Service Provider (SP)
SIMPLESAMLPHP_SP_ENTITY_ID='localhost'

# Callback URL after successful SAML authentication
SIMPLESAMLPHP_SP_ASSERTION_CONSUMER_SERVICE='http://localhost:3000/login/saml'

# (optional) Use a different set of users. Refer to build/config/users for available options.
SIMPLESAMLPHP_USERSET='unb'
```

### Users
The image comes with 12 sample UNB users, distributed into "members", "staff", "faculty", "student", and "stu" groups. Every user login follows a ```username:usernamepass``` schema.

| UID   | First Name | Last Name | Groups                 |
|-------|------------|-----------|------------------------|
| jdoe  | Jane       | Doe       | members, staff         |
| msmi  | Michael    | Smith     | members, staff         |
| awil  | Alice      | Wilson    | members, staff         |
| brob  | Brian      | Robinson  | members, staff         |
| egra  | Emily      | Grant     | members, staff         |
| jcru  | Jessica    | Cruz      | members, faculty       |
| bro   | Benjamin   | Rodriguez | members, staff         |
| fmar  | Fiona      | Martin    | members, faculty       |
| mwan  | Michelle   | Wang      | members, staff         |
| kpat  | Kyle       | Patterson | members, student       |
| nbak  | Natalie    | Baker     | members, staff         |
| jpar  | Jessica    | Park      | stu                    |


## Test
Verify that your local SAML IDP service is setup and configured correctly:
- visit [http://localhost:3000/simplesaml/module.php/core/authenticate.php](http://localhost:3000/simplesaml/module.php/core/authenticate.php)
- click on _"example-userpass"_
- login as a user from your chosen userset

## License
- As part of our 'open' ethos, UNB Libraries licenses its applications and workflows to be freely available to all whenever possible.
- Consequently, the contents of this repository [unb-libraries/docker-drupal] are licensed under the [MIT License](http://opensource.org/licenses/mit-license.html). This license explicitly excludes:
  - Any website content, which remains the exclusive property of its author(s).
  - The UNB logo and any of the associated suite of visual identity assets, which remains the exclusive property of the University of New Brunswick.