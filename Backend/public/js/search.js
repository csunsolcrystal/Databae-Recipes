jQuery(document).ready(function($) {
            // Set the Options for "Bloodhound" suggestion engine
            var engine = new Bloodhound({
                remote: {
                    url: '/find?q=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            $(".search-input").typeahead({
                hint: $('.Typeahead-hint'),
    menu: $('.Typeahead-menu'),
    minLength: 0,
    classNames: {
      open: 'is-open',
      empty: 'is-empty',
      cursor: 'is-active',
      suggestion: 'Typeahead-suggestion',
      selectable: 'Typeahead-selectable'
    }
  }, {                
	source: engine.ttAdapter(),

                // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                name: 'usersList',
		display: 'value',

                // the key from the array we want to display (name,id,email,etc...)
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    ],
                    header: [
                        '<div class="is-open">'
                    ],
                    suggestion: function (data) {
    if ( data.ratings[0] === undefined ) data.ratings[0] = 'no ratings';
	if ( data.averageRating == null ) data.averageRating = 'no ratings';

	 return  '<a href="/recipes/' + data.id + '" style="text-decoration: none;"><div class="ProfileCard u-cf Typeahead-suggestion Typeahead-selectable">' +
        '<img class="ProfileCard-avatar" src="/storage/recipes/'+data.picture+'">' +

        '<div class="ProfileCard-details">' +
          '<div class="ProfileCard-realName">'+data.title+'</div>' +
          '<div class="ProfileCard-screenName">&nbsp;@'+data.user.username+'</div>' +
          '<div class="ProfileCard-description">'+data.description.substring(0, 150)+'</div>' +
        '</div>' +

        '<div class="ProfileCard-stats">' +
          '<div class="ProfileCard-stat"><span class="ProfileCard-stat-label"><span class="fas fa-users"></span>&nbsp;Views:</span>'+data.views+'</div>' +
		  '<div class="ProfileCard-stat"><span class="ProfileCard-stat-label"><span class="fa fa-star checked"></span>&nbsp;Overall rating:</span>'+data.averageRating+'</div>' +
		  '<div class="ProfileCard-stat"><span class="ProfileCard-stat-label">Ratings:</span>'+data.ratings[0].total_ratings+'</div>' +
	'</div>' +
	'</div>' +
      '</a>' +
	  '</div>';
		}
		
                }
		
            });
        });
