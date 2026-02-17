from pypdf import PdfReader
import sys

def extract_text(pdf_path, output_path):
    try:
        reader = PdfReader(pdf_path)
        text = ""
        for page in reader.pages:
            text += page.extract_text() + "\n"
        
        with open(output_path, "w", encoding="utf-8") as f:
            f.write(text)
        print(f"Text extracted successfully to {output_path}")
    except Exception as e:
        print(f"Error extracting text: {e}")

if __name__ == "__main__":
    pdf_path = r"c:\Users\john\OneDrive\Desktop\bfhd\Affiliate Deeplink URL Structure __ Programmatic - v2.4.pdf"
    output_path = r"c:\Users\john\OneDrive\Desktop\bfhd\deeplink_guide.txt"
    extract_text(pdf_path, output_path)
