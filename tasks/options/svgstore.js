module.exports = {
   main: {
       files: {
           'assets/svg/symbol-defs.svg': ['assets/svg/src/*.svg']
       },
       options: {
           cleanup: true,
           prefix : 'icon-'
       }
   }
};