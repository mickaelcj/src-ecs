var Encore = require('@symfony/webpack-encore');
const path = require('path');
const fsr = require('fs').readFileSync;
const yml = require('js-yaml');
const CONFIGS = yml.safeLoad(fsr('./config/pages.yml'), yml.JSON_SCHEMA);
const EXCLUDE = '/node_modules/';

// set an config object used in all workspace (front-office / admin)
const aliases = (config) => {
	return {
		// add to all workspaces
		...config.resolve.alias, ...{
			'@': path.resolve(__dirname, 'assets/front_office/ts'),
			'#': path.resolve(__dirname, 'assets/front_office/scss'),
		},
		...config.resolve.extensions.push('.scss'),
	};
};

let workspaces = [];

CONFIGS.forEach(({ name, pages, ext }) => {

	console.log(` Workspace : ${name}\n`);
	console.table(pages);

	pages.forEach(page => {
		Encore.addEntry(page, path.resolve(__dirname, `assets/${name}/${page}.${ext}`));
	});

	Encore

		.cleanupOutputBeforeBuild()

		.setOutputPath(`public/build/${name}`)

		.setPublicPath(`/build/${name}`)

		.disableSingleRuntimeChunk()

		.enableBuildNotifications(!Encore.isProduction())

		.enableSourceMaps(!Encore.isProduction())

		.enableVersioning(Encore.isProduction())

		.enableSassLoader()

		.enablePostCssLoader()

		.autoProvidejQuery()

	;

	if (ext === 'ts') {
		Encore.enableTypeScriptLoader();
	}

	let config = Encore.getWebpackConfig();

	// fix build with nfs enable
	config.watchOptions = { poll: true, ignored: '/node_modules/' };
	config.name = name;
	config.resolve.alias = aliases(config);

	workspaces.push(config);

	Encore.reset();
});

module.exports = workspaces;

