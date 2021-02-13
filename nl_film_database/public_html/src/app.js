const search = instantsearch({
    indexName: "products",
    searchClient: instantMeiliSearch(
        "http://OPTIONALMEILISEARCHHOST7700/",
        "MEILIPUBLICKEY", {
            limitPerRequest: 30
        }
    )
});


search.addWidgets([
    instantsearch.widgets.searchBox({
        container: "#searchbox"
    }),
    instantsearch.widgets.clearRefinements({
        container: "#clear-refinements"
    }),
    instantsearch.widgets.refinementList({
        container: "#regisseur",
        attribute: "regisseur"
    }),
    instantsearch.widgets.refinementList({
        container: "#jaar",
        attribute: "jaar"
    }),
    instantsearch.widgets.refinementList({
        container: "#genre",
        attribute: "genre"
    }),
    instantsearch.widgets.refinementList({
        container: "#land",
        attribute: "land"
    }),
    instantsearch.widgets.refinementList({
        container: "#acteur",
        attribute: "acteur"
    }),
    instantsearch.widgets.configure({
        hitsPerPage: 12,
        snippetEllipsisText: "...",
        attributesToSnippet: ["description:50"]
    }),

    instantsearch.widgets.hits({
        container: "#hits",
        templates: {
            item: `
        <div>
          <div class="hit-name">
            {{#helpers.highlight}}{ "attribute": "title" }{{/helpers.highlight}}
          </div>
          <img src="{{image}}" align="left" />
          <div class="hit-description">
            {{#helpers.snippet}}{ "attribute": "jaar" }{{/helpers.snippet}}
          </div>
          <div class="hit-info">price: {{price}}</div>
            <div class="hit-info">release date: {{releaseDate}}</div>
        </div>
      `
        }
    }),
    instantsearch.widgets.pagination({
        container: "#pagination"
    })
]);

search.start();