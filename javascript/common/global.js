/**
 * Global javascript functions
 */

// Numeric only input
$(".numeric").keypress(function(event)
{
    // Backspace, tab, enter, end, home, left, right
    var controlKeys = [8, 9, 13, 35, 36, 37, 39];

    var isControlKey = controlKeys.join(",").match(new RegExp(event.which));

    if (!event.which ||
        (49 <= event.which && event.which <= 57) ||
        (48 == event.which && $(this).attr("value")) ||
        isControlKey)
    {
        return;
    }
    else
    {
        event.preventDefault();
    }
});