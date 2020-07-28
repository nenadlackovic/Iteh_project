import {Column, Entity, Index, OneToMany, PrimaryGeneratedColumn} from "typeorm";
import {Film} from "./Film.entity";
import {IsInt, IsString} from "class-validator"

@Entity()
@Index(["imeZanra"], { unique: true })
export class Zanr{
    @PrimaryGeneratedColumn()
    @IsInt()
    zanrId: number;

    @Column()
    @IsString()
    imeZanra: string;
    @OneToMany(type => Film, film => film.zanr)
    filmovi: Film[];
}
