 var couleurCarte = "#FF6B35";
 var couleurHover = "#423E3D";
 var frontièresDept = "#000000";

 var departements = {
 	D01: {
    id: 1,
 		nom: "Ain",
 		lien: "",
 		points: "321,227, 333,229, 341,239, 356,233, 355,242, 350,246, 350,262, 345,268, 335,255, 330,258, 327,258, 318,253, 318,241",
 	},
 	D02: {
    id: 2,
 		nom:"Aisne",
 		lien: "",
 		points:"268,55, 282,55, 292,58, 294,66, 288,74, 287,85, 277,88, 275,90, 276,102, 270,110, 258,96, 258,93, 263,84, 260,71, 261,59, 262,56",
 	},
 	D03: {
    id: 3,
 		nom:"Allier",
 		lien: "",
 		points:"254,214, 257,214, 263,219, 278,216, 279,225, 287,229, 287,235, 280,240, 282,250, 276,251, 266,248, 251,237, 242,245, 240,237, 233,230, 241,227, 244,224, 245,219",
 	},
 	D04: {
    id: 4,
 		nom:"Alpes-de-Haute-Provence",
 		lien: "",
 		points:"394,313, 391,329, 385,336, 385,338, 391,346, 391,349, 386,354, 360,358, 354,358, 347,354, 346,341, 362,326, 371,324, 384,324",
 	},
 	D05: {
    id: 5,
 		nom:"Hautes-Alpes",
 		lien: "",
 		points:"371,294, 381,295, 394,309, 394,311, 384,321, 364,322, 353,333, 345,331, 344,324, 356,313, 360,306, 374,301",
 	},
 	D06: {
    id: 6,
 		nom:"Alpes-Maritimes",
 		lien: "",
 		points:"393,329, 408,339, 419,337, 416,354, 405,360, 397,372, 387,356, 394,348, 387,338, 387,336",
 	},
 	D07: {
    id: 7,
 		nom:"Ardèche",
 		lien: "",
 		points:"315,284, 317,284, 319,309, 314,331, 313,333, 308,330, 305,330, 299,334, 291,326, 288,312, 303,298, 307,290",
 	},
 	D08: {
    id: 8,
 		nom:"Ardennes",
 		lien: "",
 		points:"313,50, 314,64, 327,73, 321,76, 320,90, 303,89, 291,84, 291,75, 297,67, 295,58, 305,58",
 	},
 	D09: {
    id: 9,
 		nom:"Ariège",
 		lien: "",
 		points:"206,385, 209,385, 216,392, 218,402, 213,408, 222,411, 224,412, 223,413, 212,417, 207,417, 178,403, 184,392",
 	},
 	D10: {
    id: 10,
 		nom:"Aube",
 		lien: "",
 		points:"297,121, 301,126, 310,127, 314,136, 314,145, 310,151, 303,154, 286,156, 281,146, 272,136, 273,125, 275,124, 281,129",
 	},
 	D11: {
    id: 11,
 		nom:"Aude",
 		lien: "",
 		points:"215,377, 240,377, 246,384, 253,381, 261,385, 263,388, 255,403, 250,401, 233,403, 232,410, 225,411, 217,408, 221,401, 219,393, 210,384",
 	},
 	D12: {
    id: 12,
 		nom:"Aveyron",
 		lien: "",
 		points:"246,306, 248,307, 255,319, 258,333, 265,341, 267,350, 267,352, 256,355, 253,361, 248,358, 245,358, 238,346, 234,342, 224,336, 219,338, 218,325, 228,317, 237,318",
 	},
 	D13: {
    id: 13,
 		nom:"Bouches-du-Rhône",
 		lien: "",
 		points:"317,354, 320,354, 331,361, 340,363, 352,363, 350,366, 352,375, 352,381, 350,385, 348,386, 333,379, 319,379, 305,374, 304,371, 308,364, 314,361",
 	},
 	D14: {
    id:14,
 		nom:"Calvados",
 		lien: "",
 		points:"126,82, 132,82, 152,89, 169,83, 171,105, 161,104, 154,110, 144,106, 134,111, 124,109, 132,99, 132,96, 125,86",
 	},
 	D15: {
    id: 15,
 		nom:"Cantal",
 		lien: "",
 		points:"240,279, 245,279, 258,286, 265,293, 267,302, 258,306, 256,315, 247,303, 237,315, 229,315, 225,300, 229,290",
 	},
 	D16: {
    id: 16,
 		nom:"Charente",
 		lien: "",
 		points:"178,245, 181,245, 185,250, 171,266, 164,279, 154,286, 148,283, 141,262, 149,259, 150,251, 153,249, 160,246, 171,248",
 	},
 	D17: {
    id: 17,
 		nom:"Charente-Maritime",
 		lien: "",
 		points:"116,235, 128,235, 130,242, 148,249, 147,257, 140,259, 138,261, 138,264, 144,282, 146,285, 152,288, 152,292, 143,291, 126,280, 112,261",
 	},
 	D18: {
    id: 18,
 		nom:"Cher",
 		lien: "",
 		points:"232,172, 243,179, 252,178, 255,192, 255,212, 244,215, 242,224, 228,229, 229,215, 226,198, 220,191, 228,185, 229,176",
 	},
 	D19: {
    id: 19,
 		nom:"Correze",
 		lien: "",
 		points:"223,264, 238,268, 239,278, 227,289, 223,299, 215,301, 207,295, 201,294, 196,277",
 	},
 	D20 :{
    id: 20,
 		nom:"Corse",
 		lien: "",
 		points: "440,409, 441,427, 446,437, 446,447, 443,463, 443,466, 442,477, 438,488, 423,479, 422,463, 415,462, 415,441, 416,435, 418,433, 429,426, 437,424, 437,411",
 	},
 	D21 :{
    id: 21,
 		nom:"Côte-d'Or",
 		lien: "",
 		points: "311,153, 318,167, 335,173, 333,180, 337,186, 337,189, 330,201, 313,204, 299,195, 293,183, 300,166, 298,157",
 	},
 	D22 :{
    id: 22,
 		nom:"Côte-d'Armor",
 		lien: "",
 		points: "58,105, 61,107, 72,123, 86,116, 91,116, 94,128, 86,138, 69,140, 44,134, 44,110",
 	},
 	D23 :{
    id: 23,
 		nom:"Creuse",
 		lien: "",
 		points: "219,232, 232,232, 237,239, 240,252, 234,259, 236,264, 225,261, 218,263, 208,254, 206,233",
 	},
 	D24 :{
    id: 24,
 		nom:"Dordogne",
 		lien: "",
 		points: "176,266, 181,272, 189,271, 193,275, 198,290, 198,307, 189,317, 182,313, 168,314, 161,309, 163,306, 162,305, 154,304, 154,288, 162,284",
 	},
 	D25 :{
    id: 25,
 		nom:"Doubs",
 		lien: "",
 		points: "383,162, 388,165, 383,174, 382,181, 387,185, 370,204, 362,220, 362,209, 351,201, 348,189, 368,175, 379,172, 381,170",
 	},
 	D26 :{
    id: 26,
 		nom:"Drôme",
 		lien: "",
 		points: "319,285, 325,285, 332,297, 339,297, 341,309, 351,314, 342,323, 342,331, 349,335, 349,337, 345,340, 342,340, 330,333, 320,334, 316,332, 321,307",
 	},
 	D27 :{
    id: 27,
 		nom:"Eure",
 		lien: "",
 		points: "176,82, 178,82, 192,93, 203,84, 213,85, 213,93, 204,101, 201,115, 185,118, 174,106, 171,83",
 	},
 	D28 :{
    id: 28,
 		nom:"Eure-et-Loir",
 		lien: "",
 		points: "206,109, 210,123, 221,136, 222,140, 218,147, 200,154, 186,143, 187,139, 191,134, 188,121, 203,118",
 	},
 	D29 :{
    id: 29,
 		nom:"Finistère",
 		lien: "",
 		points: "19,110, 41,110, 42,135, 35,141, 46,152, 46,158, 29,149, 18,152, 7,141, 18,137, 12,129, 21,122, 18,121, 6,124, 4,116",
 	},
 	D30 :{
    id: 30,
 		nom:"Gard",
 		lien: "",
 		points: "290,329, 299,336, 305,332, 313,335, 317,343, 317,352, 312,360, 305,365, 302,373, 296,370, 298,363, 282,350, 275,354, 270,352, 267,342, 288,341, 290,339",
 	},
 	D31 :{
    id: 31,
 		nom:"Haute-Garonne",
 		lien: "",
 		points: "203,353, 206,357, 209,366, 219,375, 214,375, 208,383, 185,390, 177,403, 174,402, 172,404, 171,411, 165,411, 164,409, 171,398, 165,390, 172,380, 179,377, 184,380, 186,379, 190,365, 185,358",
 	},
 	D32 :{
    id: 32,
 		nom:"Gers",
 		lien: "",
 		points: "168,346, 176,346, 181,357, 188,365, 185,377, 179,375, 170,379, 155,374, 148,365, 142,365, 144,350",
 	},
 	D33 :{
    id: 33,
 		nom:"Gironde",
 		lien: "",
 		points: "113,275, 115,275, 126,284, 130,284, 142,293, 151,294, 152,306, 159,307, 154,314, 148,330, 145,334, 139,335, 128,321, 109,320",
 	},
 	D34 :{
    id: 34,
 		nom:"Hérault",
 		lien: "",
 		points: "281,352, 295,362, 293,370, 266,385, 253,379, 247,382, 244,380, 242,377, 244,368, 253,364, 258,357, 268,353, 275,356",
 	},
 	D35 :{
    id: 35,
 		nom:"Ille-et-Vilaine",
 		lien: "",
 		points: "94,116, 111,118, 111,127, 123,128, 123,145, 116,157, 90,162, 86,142, 98,128",
 	},
 	D36 :{
    id: 36,
 		nom:"Indre",
 		lien: "",
 		points: "208,191, 213,191, 222,197, 226,213, 224,229, 196,230, 188,223, 187,216, 191,214, 192,204, 197,203, 202,193",
 	},
 	D37 :{
    id: 37,
 		nom:"Indre-et-Loire",
 		lien: "",
 		points: "176,169, 185,171, 188,175, 192,186, 199,192, 198,199, 192,200, 190,202, 188,212, 184,211, 177,199, 166,201, 160,192, 165,173",
 	},
 	D38 :{
    id: 38,
 		nom:"Isère",
 		lien: "",
 		points: "333,258, 337,260, 350,278, 362,278, 371,298, 367,301, 360,303, 354,312, 344,309, 342,294, 332,294, 326,283, 318,282, 318,277, 326,269, 329,261",
 	},
 	D39 :{
    id: 39,
 		nom:"Jura",
 		lien: "",
 		points: "339,189, 346,189, 348,202, 360,210, 360,224, 358,230, 343,236, 341,236, 336,230, 338,216, 333,203",
 	},
 	D40 :{
    id: 40,
 		nom:"Landes",
 		lien: "",
 		points: "108,322, 127,323, 138,337, 146,337, 147,341, 153,341, 153,346, 142,350, 140,365, 97,365",
 	},
 	D41 :{
    id: 41,
 		nom:"Loir-et-Cher",
 		lien: "",
 		points: "185,145, 201,157, 207,154, 206,164, 208,166, 218,171, 228,171, 224,178, 224,184, 219,189, 210,187, 201,190, 196,186, 195,179, 188,169, 186,167, 179,165, 186,157",
 	},
 	D42 :{
    id: 42,
 		nom:"Loire",
 		lien: "",
 		points: "286,238, 288,243, 300,243, 297,253, 301,267, 315,276, 315,282, 308,287, 299,279, 288,280, 289,273, 281,255, 281,253, 285,252, 283,241",
 	},
  D43 :{
    id: 43,
    nom:"Haute-Loire",
    lien: "",
    points: "268,281, 298,281, 305,288, 305,290, 300,299, 286,311, 278,305, 273,307, 271,304, 267,292, 261,285",
  },
  D44 :{
    id: 44,
    nom:"Loire-Atlantique",
    lien: "",
    points: "112,161, 114,161, 121,177, 121,179, 112,182, 114,194, 105,201, 89,195, 77,178, 77,176, 89,166",
  },
  D45 :{
    id: 45,
    nom:"Loiret",
    lien: "",
    points: "225,141, 234,141, 237,149, 250,147, 255,148, 257,156, 249,165, 252,174, 245,175, 233,168, 218,168, 211,164, 211,153, 221,149",
  },
  D46 :{
    id: 46,
    nom:"Lot",
    lien: "",
    points: "203,298, 208,298, 215,304, 223,302, 225,316, 216,324, 215,331, 200,336, 189,329, 188,321, 199,310",
  },
  D47 :{
    id: 47,
    nom:"Lot-et-Garonne",
    lien: "",
    points: "159,311, 168,316, 183,316, 187,319, 185,322, 186,330, 180,333, 175,343, 156,345, 154,340, 148,338, 147,334, 152,327, 155,315",
  },
  D48 :{
    id: 48,
    nom:"Lozère",
    lien: "",
    points: "266,304, 268,304, 273,311, 278,308, 285,313, 289,327, 289,336, 285,341, 267,339, 262,336, 261,325, 257,317, 259,308",
  },
  D49 :{
    id: 49,
    nom:"Maine-et-Loire",
    lien: "",
    points: "117,160, 133,165, 143,162, 152,171, 162,172, 157,192, 151,196, 135,198, 125,198, 116,193, 115,184, 124,179",
  },
  D50 :{
    id: 50,
    nom:"Manche",
    lien: "",
    points: "100,65, 119,67, 123,86, 131,96, 122,109, 123,111, 131,114, 130,124, 113,124, 115,115, 103,82",
  },
  D51 :{
    id: 51,
    nom:"Marne",
    lien: "",
    points: "290,86, 303,92, 318,93, 315,114, 317,119, 311,124, 308,125, 301,123, 300,117, 284,125, 281,125, 274,121, 272,111, 279,102, 279,91",
  },
  D52 :{
    id: 52,
    nom:"Haute-Marne",
    lien: "",
    points: "319,120, 336,133, 348,154, 342,166, 335,170, 320,164, 318,156, 313,151, 318,141, 312,126",
  },
  D53 :{
    id: 53,
    nom:"Mayenne",
    lien: "",
    points: "126,127, 152,127, 154,130, 155,134, 143,159, 137,161, 130,161, 119,158, 126,147",
  },
  D54 :{
    id:54,
    nom:"Meurthe-et-Moselle",
    lien: "",
    points: "337,78, 348,80, 349,100, 359,106, 361,114, 381,120, 385,125, 380,128, 371,127, 357,132, 352,130, 347,125, 346,121, 347,100, 344,89, 342,83, 336,81",
  },
  D55 :{
    id: 55,
    nom:"Meuse",
    lien: "",
    points: "329,75, 332,83, 334,85, 339,85, 345,100, 342,112, 343,126, 339,130, 335,129, 321,120, 319,116, 324,79",
  },
  D56 :{
    id: 56,
    nom:"Morbihan",
    lien: "",
    points: "43,136, 67,144, 83,142, 88,164, 75,174, 72,174, 51,162, 48,160, 47,149, 39,140",
  },
  D57 :{
    id: 57,
    nom:"Moselle",
    lien: "",
    points: "352,80, 365,82, 377,95, 397,94, 403,99, 404,103, 395,103, 387,98, 385,99, 382,108, 384,110, 393,112, 393,121, 389,125, 384,119, 364,113, 362,107, 353,100, 354,88",
  },
  D58 :{
    id: 58,
    nom:"Nièvre",
    lien: "",
    points: "257,175, 264,179, 274,178, 287,187, 293,187, 295,193, 288,197, 289,212, 277,213, 266,217, 257,211, 258,194, 254,182, 254,177",
  },
  D59 :{
    id: 59,
    nom:"Nord",
    lien: "",
    points: "238,5, 242,5, 249,21, 261,20, 271,35, 292,42, 293,56, 280,52, 261,53, 262,41, 249,23, 239,23, 231,8, 231,6",
  },
  D60 :{
    id: 60,
    nom:"Oise",
    lien: "",
    points: "217,71, 232,71, 242,76, 258,72, 260,86, 256,96, 250,98, 240,98, 227,93, 216,94",
  },
  D61 :{
    id: 61,
    nom:"Orne",
    lien: "",
    points: "161,107, 173,108, 184,120, 188,134, 183,141, 176,139, 169,126, 157,132, 152,123, 133,124, 134,112, 142,109, 154,112",
  },
  D62 :{
    id: 62,
    nom:"Pas-de-Calais",
    lien: "",
    points: "226,8, 229,9, 238,26, 249,26, 259,41, 258,53, 245,50, 237,44, 227,44, 218,37, 212,36, 214,11",
  },
  D63 :{
    id: 63,
    nom:"Puy-de-Dôme",
    lien: "",
    points: "249,241, 253,241, 265,250, 279,254, 287,275, 285,279, 268,278, 260,283, 256,283, 241,276, 238,258, 244,252, 244,246",
  },
  D64 :{
    id: 64,
    nom:"Pyrénées-Atlantiques",
    lien: "",
    points: "96,367, 106,369, 142,367, 146,372, 147,382, 137,395, 136,401, 119,397, 111,394, 87,376",
  },
  D65 :{
    id: 65,
    nom:"Hautes-Pyrénées",
    lien: "",
    points: "145,368, 149,368, 157,377, 169,380, 164,389, 165,393, 169,398, 162,410, 146,410, 138,402, 139,394, 145,388, 149,381, 149,375",
  },
  D66 :{
    id: 66,
    nom:"Pyrénées-Orientales",
    lien: "",
    points: "243,403, 256,405, 259,418, 258,423, 243,428, 232,424, 220,427, 212,420, 233,412, 234,405",
  },
  D67 :{
    id: 67,
    nom:"Bas-Rhin",
    lien: "",
    points: "405,98, 422,101, 406,138, 406,143, 390,131, 390,127, 395,121, 395,111, 385,107, 387,101, 396,105, 404,104",
  },
  D68 :{
    id: 68,
    nom:"Haut-Rhin",
    lien: "",
    points: "393,136, 405,144, 405,171, 402,175, 393,173, 391,165, 382,159",
  },
  D69 :{
    id: 69,
    nom:"Rhône",
    lien: "",
    points: "305,236, 308,236, 315,243, 315,253, 320,258, 327,260, 325,265, 325,266, 317,275, 303,266, 299,252, 301,248, 303,243, 303,237",
  },
  D70 :{
    id: 70,
    nom:"Haute-Saône",
    lien: "",
    points: "359,151, 381,160, 380,170, 370,172, 349,185, 341,187, 336,180, 336,177, 349,158",
  },
 	D71: {
    id: 71,
 		nom: "Saône-et-Loire",
 		lien: "",
 		points: "296,195, 312,207, 331,204, 335,216, 333,227, 320,224, 316,241, 308,233, 301,236, 301,241, 290,240, 290,228, 282,224, 281,222, 280,216, 293,213, 292,197"

 	},
  D72 :{
    id: 72,
    nom:"Sarthe",
    lien: "",
    points: "167,130, 176,142, 182,144, 184,155, 175,167, 167,169, 154,169, 145,159, 157,134",
  },
  D73 :{
    id: 73,
    nom:"Savoie",
    lien: "",
    points: "353,255, 357,262, 368,265, 371,263, 374,256, 377,256, 382,259, 398,275, 397,283, 382,293, 370,292, 364,276, 351,276, 347,269, 352,262",
  },
  D74 :{
    id: 74,
    nom:"Haute-Savoie",
    lien: "",
    points: "380,231, 384,231, 392,252, 384,258, 377,254, 373,254, 369,263, 358,260, 353,252, 353,246, 366,236",
  },
  D_RP :{
    id: "",
    nom:"Région-Parisienne",
    lien: "",
    points: "240,106, 242,106, 241,116, 231,114, 233,108",
  },
  D76 :{
    id: 76,
    nom:"Seine-Maritime",
    lien: "",
    points: "203,53, 205,53, 215,68, 214,82, 203,81, 193,89, 191,89, 178,79, 168,82, 165,80, 164,75, 166,68, 196,60",
  },
  D77 :{
    id: 77,
    nom:"Seine-et-Marne",
    lien: "",
    points: "244,101, 258,101, 269,113, 271,124, 268,134, 258,135, 254,138, 252,143, 241,145, 237,139, 242,135, 243,130",
  },
  D78 :{
    id: 78,
    nom:"Yvelines",
    lien: "",
    points: "208,101, 227,107, 228,116, 221,130, 212,120",
  },
  D79 :{
    id: 79,
    nom:"Deux-Sèvres",
    lien: "",
    points: "136,199, 150,199, 152,225, 159,245, 148,247, 133,240, 132,234, 137,230, 136,217, 135,212, 127,200",
  },
  D80 :{
    id: 80,
    nom:"Somme",
    lien: "",
    points: "212,38, 219,39, 227,46, 237,46, 245,52, 259,56, 258,68, 246,73, 242,73, 234,69, 217,69, 207,51, 207,48, 211,44",
  },
  D81 :{
    id: 81,
    nom:"Tarn",
    lien: "",
    points: "222,339, 226,339, 235,345, 241,357, 244,360, 251,362, 242,367, 241,374, 221,374, 211,365, 207,356, 207,350, 209,345",
  },
  D82 :{
    id: 82,
    nom:"Tarn-et-Garonne",
    lien: "",
    points: "187,331, 191,332, 198,338, 216,333, 216,339, 210,341, 204,351, 183,356, 178,341, 181,335",
  },
  D83 :{
    id: 83,
    nom:"Var",
    lien: "",
    points: "382,356, 385,356, 395,372, 391,380, 370,391, 351,386, 355,380, 352,368, 355,360",
  },
  D84 :{
    id: 84,
    nom:"Vaucluse",
    lien: "",
    points: "315,334, 317,334, 320,337, 329,335, 342,342, 345,354, 353,360, 341,361, 332,359, 319,352, 319,343, 315,337",
  },
  D85 :{
    id: 85,
    nom:"Vendée",
    lien: "",
    points: "115,196, 124,201, 131,211, 133,229, 130,231, 114,231, 98,224, 87,207, 87,197, 105,204",
  },
  D86 :{
    id: 86,
    nom:"Vienne",
    lien: "",
    points: "156,195, 158,195, 166,205, 178,204, 186,224, 192,229, 182,240, 177,243, 169,245, 161,242, 156,230, 155,222, 153,197",
  },
  D87 :{
    id: 87,
    nom:"Haute-Vienne",
    lien: "",
    points: "195,232, 203,233, 205,255, 216,265, 198,275, 195,275, 188,268, 182,269, 177,264, 177,262, 188,250, 183,243",
  },
  D88 :{
    id: 88,
    nom:"Vosges",
    lien: "",
    points: "387,127, 390,136, 381,157, 363,150, 356,150, 350,153, 346,142, 338,133, 347,129, 353,135, 356,135, 373,129, 378,131",
  },
  D89 :{
    id: 89,
    nom:"Yonne",
    lien: "",
    points: "268,136, 270,136, 286,159, 296,158, 296,165, 291,182, 274,174, 262,175, 255,171, 253,165, 262,155, 256,146, 256,141, 259,138",
  },
  D90 :{
    id: 90,
    nom:"Territoire de Belfort",
    lien: "",
    points: "389,169, 390,183, 384,181, 386,172",
  },
  D91 :{
    id: 91,
    nom:"Essonne",
    lien: "",
    points: "230,117, 240,120, 239,133, 233,137, 224,137, 223,131",
  },
  D92 :{
    id: 92,
    nom:"Hauts-de-Seine",
    lien: "",
    points: "341,37, 330,26, 329,18, 334,11, 340,8, 341,15, 334,20, 337,25, 341,26",
  },
  D93 :{
    id: 93,
    nom:"Seine-Saint-Denis",
    lien: "",
    points: "342,8, 363,4, 367,25, 362,19, 352,19, 350,15, 343,15",
  },
  D94 :{
    id: 94,
    nom:"Val-de-Marne",
    lien: "",
    points: "343,35, 343,27, 355,26, 354,21, 358,20, 367,27, 364,40, 350,39",
  },
  D95 :{
    id: 95,
    nom:"Val-d'Oise",
    lien: "",
    points: "215,97, 229,97, 241,101, 237,104, 229,105, 222,101, 214,100, 213,99",
  },
  D75 :{
    id: 75,
    nom: "Paris",
    lien: "",
    points: "336,20, 342,17, 349,17, 351,22, 348,25, 342,25"
  }
 }

$(function(){
        var map = $("#map");
        var areas = $("#areas");
        var canvas = $("#canvas")[0]; 
		    canvas.width = 500;
        canvas.height = 500;
        var c = canvas.getContext("2d");
        $.fn.render = function(){ 
          this.data.apply(this, arguments);
          render();
        }
        function clear(){
          c.fillStyle = "#FFF4F3";
          c.fillRect(0, 0, canvas.width, canvas.height);
        }
	arr = new Array();
    for (var country in departements) {
        var obj = departements[country].points;
		var lnk = departements[country].lien;
		var txt = departements[country].nom;
    var id = departements[country].id;
        $('<area />', {
          shape : "poly",
          coords : ""+obj+"",
          alt : ""+txt+"",
          id : id,
        }).data({
          fillStyle: couleurCarte,
          strokeStyle : frontièresDept,
          lineWidth : 1.2,
		        alt : ""+txt+""
        }).mouseenter(function(){
          $(this).render({strokeStyle: frontièresDept,
                          fillStyle : couleurHover});
          $("div#legende").html(""+this.alt+"");
		 render();
        }).mouseleave(function(){
            $(this).render({strokeStyle: frontièresDept,
                            fillStyle : couleurCarte});
		        $("div#legende").html("");
        }).click(function(){
            $("#formulaire").html(this.id);
            render();
        }).appendTo(areas);
        render();
}
        function fillStroke(fillStyle, strokeStyle){
          if (fillStyle) c.fill();
          if (strokeStyle) c.stroke();
        }
        function render(noClear){
          if (!noClear){
            clear();
          }
          areas.children().each(function(i){
            var area = $(this);
            var shape = area.attr("shape");
            var coords = area.attr("coords").split(",");
            var fillStyle = area.data("fillStyle");
            var strokeStyle = area.data("strokeStyle");
            var lineWidth = area.data("lineWidth");
              if (fillStyle){
                c.fillStyle = fillStyle; 
              }
              if (strokeStyle){
                if (lineWidth){
                  c.lineWidth = lineWidth; 
                }
                c.strokeStyle = strokeStyle;   
              }
              c.beginPath();
              var leng = coords.length;
              c.moveTo(coords[0], coords[1]);
              for (var i = 2; i < leng; i+=2){
                c.lineTo(coords[i], coords[i+1]); 
              }
              c.closePath();
              fillStroke(fillStyle, strokeStyle);
            c.lineWidth = 1;
          });
        }
      });