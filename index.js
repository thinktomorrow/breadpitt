var slackTerminal = require('slack-terminalize');

slackTerminal.init('xoxb-149925379527-cqHTVAIjZL6tkEDOnKkYVlje', {
	// slack client options ici
	}, {
    CONFIG_DIR: __dirname + '/config',
	COMMAND_DIR: __dirname + '/commands',
	ERROR_COMMAND: "error"
});
