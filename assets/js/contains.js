$.extend($.expr[':'], {
	containsExact: function(a,i,m) {
		return $.trim(a.innerHTML.toLowerCase()) === m[3].toLowerCase();
	},
	containsExactCase: function(a,i,m) {
		return $.trim(a.innerHTML) === m[3];
	},
	containsRegex: function(a,i,m) {
		var regreg =  /^\/((?:\\\/|[^\/])+)\/([mig]{0,3})$/,
		reg = regreg.exec(m[3]);
		return RegExp(reg[1], reg[2]).test($.trim(a.innerHTML));
	}
});