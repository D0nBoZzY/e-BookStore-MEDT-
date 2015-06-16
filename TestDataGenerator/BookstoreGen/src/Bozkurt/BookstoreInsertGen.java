package Bozkurt;
/**
 * Die Generator-Klasse, die die Tabellen der EBibliothek mit jeweils
 * 10000 datensätzen füllt.
 * @author Hüseyin Bozkurt
 * @version 2015-06-16
 */
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileWriter;
import java.io.IOException;
import java.io.RandomAccessFile;

public class BookstoreInsertGen {
	//Attribute
	String[] vname = {"Michael", "Manuel", "Erhard", "Rohat", "Matthias", "Sefa", "Jakub", "Phillip", "Thomas", "Adin"};
	//String[] nname = {"Reiländer", "Borko", "Anil", "Öztürk", "Bozkurt", "Kopec", "Adler", "Karic", "Stedronsky", "List"};
	String[] pw =  {"dacadAS", "adadcr", "fvmommmi", "krmvuakue", "vfevadv"
			,"xdcfvgbkk", "srdtfzguhb", "dctfvzgbuh", "dxrcfvgb", "crcfvzgbuh", 
	"sexdrctfvz", "kiiuvihju"};
	String[] role = {"0", "1", "2"};
	String[] tabz = {"User", "Book", "Comment", "Rating", "Read" }; 
	String[] buch = {"Willkommen im Meer", "After love: AFTER 3-Roman", "Weber's Grillbibel", "Smoothies, Shakes & Co.", "Darm mit Charme", "Low Carb", "Honigtot", "Nur einen Horizont entfernt"};
	String[] autor = {"Joanne K. Rowling", "Kerstin Gier", "Stephenie Meyer", "Suzanne Collins","J.R.R Tolkien", "Sebastian Fitzek", "Cecelia Ahern"};
	String[] genre = {"Romane", "Krimi", "Thriller", "Fantasy", "Jugendbuch", "Sachbücher", "Liebesromane", "Erotische Literatur"};
	String[] verlag = {"Ambra", "Amalthea", "Barenkamp", "Annette Betz", "Böhlau"};
	String[] sprache = {"Deutsch", "Englisch", "Türkisch", "Schwedisch"};
	BufferedWriter op;
	String text;
	String datum;
	
	//Konstruktor
	public BookstoreInsertGen() throws IOException {
		try {
			op = new BufferedWriter(new FileWriter("BookstoreInsert.sql"));
		} catch (FileNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		for(int x = 0; x < tabz.length;x++) {
			for(int i = 0; i < 10000;i++) {
				text = ("INSERT INTO "+tabz[x]+" VALUES(");
				switch(tabz[x]){ 

					case "User": 
						op.write(text + i+", '" + vname[(int)(Math.random()*10)]+"', '"+pw[(int)(Math.random()*10)]+"', "+role[(int)(Math.random()*3)]+");");
						op.newLine();
						break;
						
					case "Book":
						datum = "2014-" + (int)(Math.random()*12) + "-" + (int)(Math.random()*31);
						op.write(text + i + ", '" + buch[(int)(Math.random()*8)] + "', '"+ autor[(int)(Math.random()*7)] + "', '"+ genre[(int)(Math.random()*8)] + "', '"+  
								verlag[(int)(Math.random()*5)]+ "', '"+ sprache[(int)(Math.random()*4)]+ "', '"+ "Viel Blödsinn" + "', '"+ " PATH?" + "', '" + datum + "', "+ i);
						op.newLine();
						break;
					case "Comment":
						datum = "2014-" + (int)(Math.random()*12) + "-" + (int)(Math.random()*31);
						op.write(text + i + ", " + i + ", " + i + ", '" + "Title" + i + "', '"+ datum + "', '" + "Inhalt des Kommentars" + i + "');");
						op.newLine();
						break;
					
					case "Rating":
						//datum = "2014-" + (int)(Math.random()*12) + "-" + (int)(Math.random()*30);
						op.write(text + i + ", "+ i + ", " + (int)(Math.random()*5)+1+"');");
						op.newLine();
						break;
						
				}
					
				}
			}

			op.close();
		}
		public static void main(String[]args) {
			try {
				new BookstoreInsertGen();
			} catch (IOException io) {
				System.out.print("Fehler.");
			}
		} 
	}

