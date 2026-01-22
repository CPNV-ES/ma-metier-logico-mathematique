# Structure exercise
## Content
### Signle select
```json
{
    "type": "single_select",
    "prompt": "Choisissez le plus grand.",
    "instruction": "Clique sur un seul élément.", 
    "game_category_id" : "1",
    "game_type_id" : "3",
    "levels" : "5",
    "elements": [
    {
      "id": "e1",
      "name": "2",
      "label": "2",
      "media_id": null,
      "value": 2,
      "meta": {}
    },
    {
      "id": "e2",
      "name": "10",
      "label": "10",
      "media_id": null,
      "value": 10,
      "meta": {}
    },
    {
      "id": "e3",
      "name": "5",
      "label": "5",
      "media_id": null,
      "value": 5,
      "meta": {}
    }
  ]
}
```
### Multi select
```json
{
    "type": "multi_select",
    "prompt": "Clique sur toutes les bonnes réponses.",
    "instruction": "Tu peux sélectionner plusieurs éléments.",
    "game_category_id" : "1",
    "game_type_id" : "3",
    "levels" : "5",
    "elements": [
        {
            "id": "e1",
            "name": "Cochon",
            "label": "Cochon",
            "media_id": 12,
            "value": null,
            "meta": {}
        },
        {
            "id": "e2",
            "name": "Chat",
            "label": "Chat",
            "media_id": 13,
            "value": null,
            "meta": {}
        }
    ],
    "interaction": {
        "mode": "click",
        "selection": "multiple",
        "store": "name",
        "shuffle_elements": true,
        "max_selections": null
    },
    "validation_hint": {
        "order_matters": false
    },
    "ui": {
        "layout": "grid",
        "columns": 3
    }
}
```

### Ordering
```json
{
    "type": "ordering",
    "prompt": "Ordonne du plus petit au plus grand.",
    "instruction": "Déplace les éléments pour les mettre dans le bon ordre.",
    "game_category_id" : "1",
    "game_type_id" : "3",
    "levels" : "5",
    "elements": [
        {
            "id": "n1",
            "name": "2",
            "label": "2",
            "media_id": null,
            "value": 2,
            "meta": {}
        },
        {
            "id": "n2",
            "name": "10",
            "label": "10",
            "media_id": null,
            "value": 10,
            "meta": {}
        },
        {
            "id": "n3",
            "name": "5",
            "label": "5",
            "media_id": null,
            "value": 5,
            "meta": {}
        }
    ],
    "interaction": {
        "mode": "drag_drop",
        "direction": "asc",
        "store": "name",
        "shuffle_elements": true
    },
    "validation_hint": {
        "order_matters": true
    },
    "ui": {
        "layout": "row"
    }
}

```
