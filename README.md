# Implementation of GraphQL add ons for Silverstripe based on the given schema from the [Original ReadMe](Original.md)

## Installation

```
composer install
```
If there's any compatibility issue, run this command:
```
composer install --ignore-platform-reqs
```

## Environment Builder
Go to this URL to start building the environment and database records
```
http://localhost/dev/build?flush=1
```

## Done tasks

1. Creating Data Objects
2. Creating Queries
3. Creating Mutation(CREATE)
4. Add more dependencies such as: Dev tool and Asset Admin
5. Applied CodeSniffer and PSR(PHP Coding standards)

Sample query and mutation:

First, you have to go to this URL to be able to see the graphiql(playground):
```
http://localhost/dev/graphiql
```

You can run a query with the following query(read):
```
Write your query or mutation here
{
  Body {
    label
    url
    type
  }
}
```

You can run a mutation(create) to test some adding data:
```
# Write your query or mutation here
mutation($label: String!, $url: String, $url: String, $url: String) {
  createBody(label: $label, url: $url) {
    label
    url
    type
  }
}
```

This will create a body with a label, url, and type, which you can pass in as query variables:

{
  "label": "test_label1",
  "url": "test_url1",
  "type": "test_type1"
}

## In Progress

Everything as I understood had already been created, the integration of GraphQL Queries and the retrieval of data from the the data source or database, Except for the following roadblocks.

1. Mutation - I have followed all the configuration from github docs online but seems to have problem with the post back response. Though the mutations is being successful after trying to mutate the data.

2. Mutation for UPDATE and DELETE. Took me some time to search the update and delete since it is not present on the github docs.

2. Unit testing for the mutations and queries(READ).

## Future Improvements

1. Only basic authentication only applied to this project. Solid authentication like JWT must worth a try since the data are over exposed(eg Email).

2. Since Silverstripe and GraphQL is quite new to me, deep dive and study the following: Silverstrip admin interface, GraphQL queries/mutations. Creation of queries/mutations in Frontend.

Added libraries:
1. [SilverStripe Asset Admin Module](https://github.com/silverstripe/silverstripe-asset-admin)
2. [Dev tools for silverstripe-graphql](https://github.com/silverstripe/silverstripe-graphql-devtools)

Note: Silverstripe requires php unit with a version which is no longer supported on PHP 8.
