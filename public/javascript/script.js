$(document).ready(function () {
    $('#addSkill').on('click', function () {
        // Create a new skill entry
        var newSkillEntry = $('<div>').addClass('skillEntry');
        
        // Create a new skill label with input and delete button
        var newSkillLabel = $('<label>').html('Skills: <input type="hidden" name="skill_ID[]" value=""><input type="text" name="skill[]" class="skill">');

        // Create a new level label with the select element
        var newLevelLabel = $('<label>').html('Level : <select name="skillLevel[]" class="skillLevel"></select>');

        // Add options to the select element
        for (var i = 0; i <= 10; i++) {
            newLevelLabel.find('select').append('<option value="' + i + '">' + i + '</option>');
        }

        // Create a new delete button
        var newDeleteButton = $('<button>').attr('type', 'button').attr('name', 'deleteSkill').addClass('deleteSkill').html('DELETE');

        // Append newSkillLabel, newLevelLabel, and newDeleteButton to newSkillEntry
        newSkillEntry.append(newSkillLabel);
        newSkillEntry.append(newLevelLabel);
        newSkillEntry.append(newDeleteButton);

        // Append newSkillEntry to skillsContainer
        $('#skillsContainer').append(newSkillEntry);
    });
});


$(document).ready(function () {
    // Add Skill button click event
    $('#addSkill').on('click', function () {
        var newSkillEntry = $('#skillEntry').clone();
        newSkillEntry.removeAttr('id');
        newSkillEntry.find('input, select').val('');
        newSkillEntry.find('button[name="deleteSkill"]').on('click', function () {
            $(this).closest('.skillEntry').remove();
        });
        $('#skillsContainer').append(newSkillEntry);
    });

    // Delete Skill button click event for existing entries
    $(document).on('click', 'button[name="deleteSkill"]', function () {
        $(this).closest('.skillEntry').remove();
    });
});


$(document).ready(function() {
    $('.deleteSkill').on('click', function() {
        var deleteButton = $(this);
        var skillId = deleteButton.data('skill-id');

        // Ask for confirmation before deleting
        var confirmDelete = confirm('Are you sure you want to delete this skill?');

        if (confirmDelete) {
            $.ajax({
                type: 'POST',
                url: '/edit/delete-skill',
                data: {
                    skill_ID: skillId,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);
                    deleteButton.closest('.skillEntry').remove();
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }
    });
});

$(document).ready(function(){
    // Hide the success message after 2 seconds
    setTimeout(function(){
        $('.success-message').fadeOut('slow');
    }, 1000);
});

$(document).ready(function(){
    // Hide the success message after 2 seconds
    setTimeout(function(){
        $('.error-message').fadeOut('slow');
    }, 1000);
});