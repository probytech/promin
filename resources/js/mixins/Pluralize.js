export default {
	slugify: function (s, opt) {
		s = String(s);
		opt = Object(opt);

		var defaults = {
			delimiter: "_",
			limit: undefined,
			lowercase: true,
			replacements: {},
			transliterate: typeof XRegExp === "undefined" ? true : false,
		};

		// Merge options
		for (var k in defaults) {
			if (!opt.hasOwnProperty(k)) {
				opt[k] = defaults[k];
			}
		}

		var char_map = {
			// Latin
			À: "A",
			Á: "A",
			Â: "A",
			Ã: "A",
			Ä: "A",
			Å: "A",
			Æ: "AE",
			Ç: "C",
			È: "E",
			É: "E",
			Ê: "E",
			Ë: "E",
			Ì: "I",
			Í: "I",
			Î: "I",
			Ï: "I",
			Ð: "D",
			Ñ: "N",
			Ò: "O",
			Ó: "O",
			Ô: "O",
			Õ: "O",
			Ö: "O",
			Ő: "O",
			Ø: "O",
			Ù: "U",
			Ú: "U",
			Û: "U",
			Ü: "U",
			Ű: "U",
			Ý: "Y",
			Þ: "TH",
			ß: "ss",
			à: "a",
			á: "a",
			â: "a",
			ã: "a",
			ä: "a",
			å: "a",
			æ: "ae",
			ç: "c",
			è: "e",
			é: "e",
			ê: "e",
			ë: "e",
			ì: "i",
			í: "i",
			î: "i",
			ï: "i",
			ð: "d",
			ñ: "n",
			ò: "o",
			ó: "o",
			ô: "o",
			õ: "o",
			ö: "o",
			ő: "o",
			ø: "o",
			ù: "u",
			ú: "u",
			û: "u",
			ü: "u",
			ű: "u",
			ý: "y",
			þ: "th",
			ÿ: "y",

			// Latin symbols
			"©": "(c)",

			// Greek
			Α: "A",
			Β: "B",
			Γ: "G",
			Δ: "D",
			Ε: "E",
			Ζ: "Z",
			Η: "H",
			Θ: "8",
			Ι: "I",
			Κ: "K",
			Λ: "L",
			Μ: "M",
			Ν: "N",
			Ξ: "3",
			Ο: "O",
			Π: "P",
			Ρ: "R",
			Σ: "S",
			Τ: "T",
			Υ: "Y",
			Φ: "F",
			Χ: "X",
			Ψ: "PS",
			Ω: "W",
			Ά: "A",
			Έ: "E",
			Ί: "I",
			Ό: "O",
			Ύ: "Y",
			Ή: "H",
			Ώ: "W",
			Ϊ: "I",
			Ϋ: "Y",
			α: "a",
			β: "b",
			γ: "g",
			δ: "d",
			ε: "e",
			ζ: "z",
			η: "h",
			θ: "8",
			ι: "i",
			κ: "k",
			λ: "l",
			μ: "m",
			ν: "n",
			ξ: "3",
			ο: "o",
			π: "p",
			ρ: "r",
			σ: "s",
			τ: "t",
			υ: "y",
			φ: "f",
			χ: "x",
			ψ: "ps",
			ω: "w",
			ά: "a",
			έ: "e",
			ί: "i",
			ό: "o",
			ύ: "y",
			ή: "h",
			ώ: "w",
			ς: "s",
			ϊ: "i",
			ΰ: "y",
			ϋ: "y",
			ΐ: "i",

			// Turkish
			Ş: "S",
			İ: "I",
			Ç: "C",
			Ü: "U",
			Ö: "O",
			Ğ: "G",
			ş: "s",
			ı: "i",
			ç: "c",
			ü: "u",
			ö: "o",
			ğ: "g",

			// Russian
			А: "A",
			Б: "B",
			В: "V",
			Г: "G",
			Д: "D",
			Е: "E",
			Ё: "Yo",
			Ж: "Zh",
			З: "Z",
			И: "I",
			Й: "J",
			К: "K",
			Л: "L",
			М: "M",
			Н: "N",
			О: "O",
			П: "P",
			Р: "R",
			С: "S",
			Т: "T",
			У: "U",
			Ф: "F",
			Х: "H",
			Ц: "C",
			Ч: "Ch",
			Ш: "Sh",
			Щ: "Sh",
			Ъ: "",
			Ы: "Y",
			Ь: "",
			Э: "E",
			Ю: "Yu",
			Я: "Ya",
			а: "a",
			б: "b",
			в: "v",
			г: "g",
			д: "d",
			е: "e",
			ё: "yo",
			ж: "zh",
			з: "z",
			и: "i",
			й: "j",
			к: "k",
			л: "l",
			м: "m",
			н: "n",
			о: "o",
			п: "p",
			р: "r",
			с: "s",
			т: "t",
			у: "u",
			ф: "f",
			х: "h",
			ц: "c",
			ч: "ch",
			ш: "sh",
			щ: "sh",
			ъ: "",
			ы: "y",
			ь: "",
			э: "e",
			ю: "yu",
			я: "ya",

			// Ukrainian
			Є: "Ye",
			І: "I",
			Ї: "Yi",
			Ґ: "G",
			є: "ye",
			і: "i",
			ї: "yi",
			ґ: "g",

			// Czech
			Č: "C",
			Ď: "D",
			Ě: "E",
			Ň: "N",
			Ř: "R",
			Š: "S",
			Ť: "T",
			Ů: "U",
			Ž: "Z",
			č: "c",
			ď: "d",
			ě: "e",
			ň: "n",
			ř: "r",
			š: "s",
			ť: "t",
			ů: "u",
			ž: "z",

			// Polish
			Ą: "A",
			Ć: "C",
			Ę: "e",
			Ł: "L",
			Ń: "N",
			Ó: "o",
			Ś: "S",
			Ź: "Z",
			Ż: "Z",
			ą: "a",
			ć: "c",
			ę: "e",
			ł: "l",
			ń: "n",
			ó: "o",
			ś: "s",
			ź: "z",
			ż: "z",

			// Latvian
			Ā: "A",
			Č: "C",
			Ē: "E",
			Ģ: "G",
			Ī: "i",
			Ķ: "k",
			Ļ: "L",
			Ņ: "N",
			Š: "S",
			Ū: "u",
			Ž: "Z",
			ā: "a",
			č: "c",
			ē: "e",
			ģ: "g",
			ī: "i",
			ķ: "k",
			ļ: "l",
			ņ: "n",
			š: "s",
			ū: "u",
			ž: "z",
		};

		// Make custom replacements
		for (var k in opt.replacements) {
			s = s.replace(RegExp(k, "g"), opt.replacements[k]);
		}

		// Transliterate characters to ASCII
		if (opt.transliterate) {
			for (var k in char_map) {
				s = s.replace(RegExp(k, "g"), char_map[k]);
			}
		}

		// Replace non-alphanumeric characters with our delimiter
		var alnum =
			typeof XRegExp === "undefined"
				? RegExp("[^a-z0-9]+", "ig")
				: XRegExp("[^\\p{L}\\p{N}]+", "ig");
		s = s.replace(alnum, opt.delimiter);

		// Remove duplicate delimiters
		s = s.replace(RegExp("[" + opt.delimiter + "]{2,}", "g"), opt.delimiter);

		// Truncate slug to max. characters
		s = s.substring(0, opt.limit);

		// Remove delimiter from ends
		s = s.replace(
			RegExp("(^" + opt.delimiter + "|" + opt.delimiter + "$)", "g"),
			""
		);

		return opt.lowercase ? s.toLowerCase() : s;
	},
	plural: function (word) {
		const plural = {
			"(quiz)$": "$1zes",
			"^(ox)$": "$1en",
			"([m|l])ouse$": "$1ice",
			"(matr|vert|ind)ix|ex$": "$1ices",
			"(x|ch|ss|sh)$": "$1es",
			"([^aeiouy]|qu)y$": "$1ies",
			"(hive)$": "$1s",
			"(?:([^f])fe|([lr])f)$": "$1$2ves",
			"(shea|lea|loa|thie)f$": "$1ves",
			sis$: "ses",
			"([ti])um$": "$1a",
			"(tomat|potat|ech|her|vet)o$": "$1oes",
			"(bu)s$": "$1ses",
			"(alias)$": "$1es",
			"(octop)us$": "$1i",
			"(ax|test)is$": "$1es",
			"(us)$": "$1es",
			"([^s]+)$": "$1s",
		};
		const irregular = {
			move: "moves",
			foot: "feet",
			goose: "geese",
			sex: "sexes",
			child: "children",
			man: "men",
			tooth: "teeth",
			person: "people",
		};
		const uncountable = [
			"sheep",
			"fish",
			"deer",
			"moose",
			"series",
			"species",
			"money",
			"rice",
			"information",
			"equipment",
			"bison",
			"cod",
			"offspring",
			"pike",
			"salmon",
			"shrimp",
			"swine",
			"trout",
			"aircraft",
			"hovercraft",
			"spacecraft",
			"sugar",
			"tuna",
			"you",
			"wood",
		];
		// save some time in the case that singular and plural are the same
		if (uncountable.indexOf(word.toLowerCase()) >= 0) {
			return word;
		}
		// check for irregular forms
		for (const w in irregular) {
			const pattern = new RegExp(`${w}$`, "i");
			const replace = irregular[w];
			if (pattern.test(word)) {
				return word.replace(pattern, replace);
			}
		}
		// check for matches using regular expressions
		for (const reg in plural) {
			const pattern = new RegExp(reg, "i");
			if (pattern.test(word)) {
				return word.replace(pattern, plural[reg]);
			}
		}
		return word;
	},
	singular: function (word) {
		const singular = {
			"(quiz)zes$": "$1",
			"(matr)ices$": "$1ix",
			"(vert|ind)ices$": "$1ex",
			"^(ox)en$": "$1",
			"(alias)es$": "$1",
			"(octop|vir)i$": "$1us",
			"(cris|ax|test)es$": "$1is",
			"(shoe)s$": "$1",
			"(o)es$": "$1",
			"(bus)es$": "$1",
			"([m|l])ice$": "$1ouse",
			"(x|ch|ss|sh)es$": "$1",
			"(m)ovies$": "$1ovie",
			"(s)eries$": "$1eries",
			"([^aeiouy]|qu)ies$": "$1y",
			"([lr])ves$": "$1f",
			"(tive)s$": "$1",
			"(hive)s$": "$1",
			"(li|wi|kni)ves$": "$1fe",
			"(shea|loa|lea|thie)ves$": "$1f",
			"(^analy)ses$": "$1sis",
			"((a)naly|(b)a|(d)iagno|(p)arenthe|(p)rogno|(s)ynop|(t)he)ses$":
				"$1$2sis",
			"([ti])a$": "$1um",
			"(n)ews$": "$1ews",
			"(h|bl)ouses$": "$1ouse",
			"(corpse)s$": "$1",
			"(us)es$": "$1",
			s$: "",
		};
		const irregular = {
			move: "moves",
			foot: "feet",
			goose: "geese",
			sex: "sexes",
			child: "children",
			man: "men",
			tooth: "teeth",
			person: "people",
		};
		const uncountable = [
			"sheep",
			"fish",
			"deer",
			"moose",
			"series",
			"species",
			"money",
			"rice",
			"information",
			"equipment",
			"bison",
			"cod",
			"offspring",
			"pike",
			"salmon",
			"shrimp",
			"swine",
			"trout",
			"aircraft",
			"hovercraft",
			"spacecraft",
			"sugar",
			"tuna",
			"you",
			"wood",
		];
		// save some time in the case that singular and plural are the same
		if (uncountable.indexOf(word.toLowerCase()) >= 0) {
			return word;
		}
		// check for irregular forms
		for (const w in irregular) {
			const pattern = new RegExp(`${irregular[w]}$`, "i");
			const replace = w;
			if (pattern.test(word)) {
				return word.replace(pattern, replace);
			}
		}
		// check for matches using regular expressions
		for (const reg in singular) {
			const pattern = new RegExp(reg, "i");
			if (pattern.test(word)) {
				return word.replace(pattern, singular[reg]);
			}
		}
		return word;
	},
};
